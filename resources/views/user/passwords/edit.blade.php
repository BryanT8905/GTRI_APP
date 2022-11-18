<div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Change {{ $user->name }} Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{  route('passwords.update', $user) }}" method="POST">
                        @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>