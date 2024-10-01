<div class="login-box">
    <div class="login-logo">
        <a href="/assets/index2.html"><b>User</b> Login</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form wire:submit.prevent='login'>
                <div class="input-group mb-3">
                    <input wire:model='email' type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input wire:model='password' type="password" id="password" class="form-control"
                        placeholder="Password">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-primary" id="togglePassword"><i class="fa fa-eye"
                                id="iconPass"></i></button>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $("#togglePassword").on("click", function() {

                let passwordInput = $("#password");
                let icon = $("#iconPass");

                if (passwordInput.attr("type") == 'password') {
                    passwordInput.attr("type", "text");
                    icon.removeClass("fa-eye")
                    icon.addClass("fa-eye-slash")
                } else {
                    passwordInput.attr("type", "password");
                    icon.addClass("fa-eye")
                    icon.removeClass("fa-eye-slash")
                }
            });
        });
    </script>
@endpush
