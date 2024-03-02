<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UsersBasic extends Component
{
    use WithPagination;

    //region Properties

    public $perPage = 6;
    public $search;
    public $editField;
    public $loading = 'Please wait...';
    public $orderBy = 'name';
    public $orderAsc = true;


    #[Validate([
        'editUser.name' => 'required|min:3|max:30|unique:users,name',
        'editUser.email' => 'required|min:3|max:30|unique:users,email'
    ], as: [
        'editUser.name' => 'name for this user',
        'editUser.email' => 'email for this user'
    ])]
    public $editUser = ['id' => null, 'name' => null, 'email' => null];

    //endregion

    #[Layout('layouts.vinylshop', ['title' => 'Users (basic)', 'description' => 'Manage users (basic)',])]
    public function render(): View
    {
        $users = User::when($this->search, function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.users-basic', compact('users'));
    }

    //region Methods

    /**
     * Reset all values and error messages.
     *
     * @return void
     */
    public function resetValues(): void
    {
        // Reset the editUser property to its initial state.
        $this->reset('editUser');

        // Reset the Livewire error bag to clear any validation errors.
        $this->resetErrorBag();
    }

    /**
     * Start editing a user's information.
     *
     * @param User $user
     * @param  string  $field
     * @return void
     */
    public function edit(User $user, string $field): void
    {
        // Set the editUser property with the specified fields from the given user.
        $this->editUser = $user->only('id', 'name', 'email');

        // Set the editField property to indicate the field being edited (e.g., 'name' or 'email').
        $this->editField = $field;
    }

    //region CRUD

    /**
     * Update a user's information.
     *
     * @param  User  $user
     * @param  string  $field
     * @return void
     */
    public function update(User $user, string $field): void
    {
        // Sleep for 2 seconds (simulating a delay, e.g., for user experience).
        sleep(2);

        // Trim the edited value to remove extra whitespace.
        $trimmedValue = trim($this->editUser[$field]);

        // If the trimmed value is the same as the current user's value, reset the form.
        if (strtolower($trimmedValue) === strtolower($user->$field)) {
            $this->resetValues();
            return;
        }

        // Validate the trimmed value using Livewire validation rules.
        $this->validateOnly("editUser.$field");

        // Update the user's field with the trimmed value.
        $user->update([$field => $trimmedValue]);

        // Reset form values and error messages.
        $this->resetValues();
    }

    /**
     * Toggle user's active or admin state.
     *
     * @param  int  $userId
     * @param  string  $field
     * @return void
     */
    public function toggleUserState(int $userId, string $field): void
    {
        // Find the user with the specified ID or throw an exception if not found.
        $user = User::findOrFail($userId);

        // Toggle the user's field value.
        $user->$field = !$user->$field;

        // Save the updated user.
        $user->save();
    }

    /**
     * Delete a user and show a success toast.
     *
     * @param  int  $id
     * @return void
     */
    public function delete(int $id): void
    {
        // Find the user with the specified ID or throw an exception if not found.
        $user = User::findOrFail($id);

        // Delete the user from the database.
        $user->delete();

        // Show a success toast indicating that the user has been deleted.
        $this->showToast('success', "The user <b><i>$user->name</i></b> has been deleted.");

    }

    //endregion

    /**
     * Show a Swal toast with specified background and message.
     *
     * @param  string  $background
     * @param  string  $message
     * @return void
     */
    public function showToast(string $background, string $message): void
    {
        // Dispatch a Livewire event to show a Swal toast with the provided background and message.
        $this->dispatch('swal:toast', [
            'background' => $background,
            'html' => $message
        ]);
    }

    /**
     * Resort users based on the selected column.
     *
     * @param  string  $column
     * @return void
     */
    public function resort(string $column): void
    {
        // Toggle the sorting order if the selected column is the same as the current sorting column.
        // Otherwise, set the sorting order to 'ascending' and update the sorting column.
        $this->orderAsc = !($this->orderBy === $column) || !$this->orderAsc;
        $this->orderBy = $column;
    }
    //endregion
}
