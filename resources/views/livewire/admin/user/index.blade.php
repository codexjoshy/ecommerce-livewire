<div class="row" wire:key='update-user-form'>

     <div class="col-12">
          @if(session('deleted'))
          <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
               {{ session('deleted') }}
          </x-base.alert>
          @endif
          <x-base.card title="Users">
               <x-slot name='action'>
                    <x-modal-button key='create-user' class="btn  btn-primary" href="{{ route('category.create') }}">
                         Create
                    </x-modal-button>
               </x-slot>

               <x-base.table>
                    <x-slot name="thead">
                         <th>Full Name</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Actions</th>
                    </x-slot>

                    <x-slot name="tbody">
                         @foreach($users as $user)
                         <tr wire:key="item-{{ $user->id }}">
                              <td>{{ ucfirst($user->name) }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                   {{ optional($user->role)->name }}
                              </td>
                              <td class="w-full d-flex" style="justify-content: space-around">

                                   <x-modal-button wire:key="userEdit-{{ $user->id }}"
                                        wire:click="editUser({{ $user->id }})" class="btn-info btn-xs btn"
                                        key="update-user">
                                        <i class="fa fa-pencil"></i> Edit
                                   </x-modal-button>

                                   <x-base.form wire:submit.prevent='deleteUser({{ $user->id }})'>
                                        <x-base.button class="btn btn-xs btn-danger">
                                             <i class="fa fa-trash"></i> Delete
                                        </x-base.button>

                                   </x-base.form>

                              </td>
                         </tr>
                         @endforeach
                    </x-slot>
               </x-base.table>
               <div>
                    {{-- {{ $categories->links() }} --}}
               </div>
          </x-base.card>
     </div>

     <x-modal wire:ignore.self title="Update" key="update-user" data-backdrop="static" livewireClose='closeModal'>
          @if(session('error'))
          <x-base.alert type="danger" title="Error" icon="fa-times" class="no-print">
               {{ session('error') }}

          </x-base.alert>
          @endif
          @if(session('success'))
          <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
               {{ session('success') }}
          </x-base.alert>
          @endif
          <form wire:submit.prevent="updateUser">
               <div wire:loading>
                    <div class="spinner-border text-primary" role="status"><span
                              class="visually-hidden">Loading...</span></div>
               </div>
               <div wire:loading.remove>
                    @include('components.users.form', [ "btnTitle"=> "Update", "title"=> "Update User", "roles"=>
                    $roles])
                    <x-base.form-group class="text-center">
                         <button type="submit" class="btn-primary btn">
                              Update
                         </button>
                    </x-base.form-group>
               </div>
          </form>
     </x-modal>

     <div wire:ignore.self class="modal fade" id="create-user" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          @if(session('error'))
          <x-base.alert type="danger" title="Error" icon="fa-times" class="no-print">
               {{ session('error') }}

          </x-base.alert>
          @endif
          @if(session('success'))
          <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
               {{ session('success') }}
          </x-base.alert>
          @endif
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                         <button type="button" wire:click="closeModal" class="close" data-dismiss="modal"
                              aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form wire:submit.prevent="createUser">
                         <div class="modal-body">
                              @include('components.users.form', [ "btnTitle"=> "Update", "title"=> "Create
                              User","roles"=> $roles])
                         </div>
                         <div class="modal-footer">
                              <button wire:click="closeModal" type="button" class="btn btn-secondary"
                                   data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     @push('scripts')
     <script>
          window.addEventListener('close-modal', e=>{
       $('#create-user').modal('hide');
       $('#update-user').modal('hide');
      })
     </script>
     @endpush
</div>