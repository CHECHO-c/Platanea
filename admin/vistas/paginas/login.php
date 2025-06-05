<body class="hold-transition login-page login-material">
    <div class="login-box">
        <div class="login-logo">
            <h2 ><b></b>Platanea</h2>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Iniciar sesión</p>

            <form method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="log_email" required>
                    <label class="form-label">Email</label>
                    <i class="fa fa-envelope form-control-feedback"></i>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="log_pass" required>
                    <label class="form-label">Contraseña</label>
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>

                <div class="row">
                    <div class="col-xs-12 ">
                        <button type="submit" class="btn-material ripple">Ingresar</button>
                    </div>
                </div>

                <?php
                $ingreso = new ctrUsuarios();
                $ingreso->ctrIngresoUsuarios();
                ?>
            </form>
        </div>
    </div>

   
    <script>
        $(function () {
            $('.form-control').each(function () {
                if ($(this).val().trim() !== '') {
                    $(this).addClass('has-value');
                }
            });

            $('.form-control').on('focus blur input', function (e) {
                if (e.type === 'focus' || this.value.trim() !== '') {
                    $(this).addClass('has-value');
                } else if (e.type === 'blur' && this.value.trim() === '') {
                    $(this).removeClass('has-value');
                }
            });

            $('.ripple').on('click', function (e) {
                var $ripple = $(this);
                var x = e.pageX - $ripple.offset().left;
                var y = e.pageY - $ripple.offset().top;

                $ripple.css({
                    '--ripple-x': x + 'px',
                    '--ripple-y': y + 'px'
                }).addClass('animate');

                setTimeout(function () {
                    $ripple.removeClass('animate');
                }, 500);
            });
        });
    </script>
</body>

</html>