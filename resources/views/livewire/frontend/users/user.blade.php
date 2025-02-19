@extends('livewire.frontend.layouts.app')
@section('css')
<style>
    .user_id{
        color:red;
    }
</style>
@endsection
@section('content')

    <div x-data="{ users: @js($users) }">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="user in users" :key="user.id">
                    <tr>
                        <!-- Displaying User Details -->
                        <td class="user_id" x-text="user.id"></td>
                        <td x-text="user.name"></td>
                        <td x-text="user.email"></td>
                        <td x-text="user.mobile_no"></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
@endsection
@section('js')
@endsection
