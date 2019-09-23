<template>
    <div>
        <div class="m-portlet">
            <div class="m-portlet__head" style="margin-bottom:20px;">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Tambah User
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Lengkap</label>
                    <div class="m-form__control">
                        <input type="text" name="name" class="form-control">
                    </div>
                    <span class="m-form__help">Masukan Nama Lengkap</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Username">Username</label>
                    <div class="m-form__control">
                        <input type="text" name="username" class="form-control">
                    </div>
                    <span class="m-form__help">Tolong Ingat Username Ini Karena di Pakai Untuk <strong>Login</strong></span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Username">Email</label>
                    <div class="m-form__control">
                        <input type="email" name="email" class="form-control">
                    </div>
                    <span class="m-form__help">Masukan Email</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Password</label>
                    <div class="m-form__control">
                        <input type="password" name="password" class="form-control">
                    </div>
                    <span class="m-form__help">Tolong Ingat Password Ini Karena di Pakai Untuk <strong>Login</strong></span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Jabatan">Jabatan</label>
                    <div class="m-form__control">
                        <input type="text" name="jabatan" class="form-control">
                    </div>
                    <span class="m-form__help">Masukan Jabatan</span>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7">
                                <button type="submit" class="btn btn-brand">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'UserCreate',
}
</script>
