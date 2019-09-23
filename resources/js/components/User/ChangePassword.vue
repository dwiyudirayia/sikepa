<template>
    <div class="m-portlet">
        <div class="m-portlet__head" style="margin-bottom:20px;">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Form Ganti Password
                    </h3>
                </div>
            </div>
        </div>
        <form  class="m-form m-form--fit">
            <div class="form-group m-form__group">
                <label for="Nama">Password Sekarang</label>
                <div class="m-form__control">
                    <input type="password" name="current-password" class="form-control">
                </div>
                <span class="m-form__help">Masukan Password Saat Ini</span>
            </div>

            <div class="form-group m-form__group">
                <label for="Nama">Password Baru</label>
                <div class="m-form__control">
                    <input type="password" name="new-password" class="form-control">
                </div>
                <span class="m-form__help">Masukan Password Baru</span>
            </div>
            <div class="form-group m-form__group">
                <label for="Nama">Konfirmasi Password</label>
                <div class="m-form__control">
                    <input type="password" name="new-password_confirmation" class="form-control">
                </div>
                <span class="m-form__help">Konfirmasi Password Baru</span>
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
</template>
<script>
export default {

}
</script>
