<template>
    <div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#">
										<!-- <img src="../../../assets/app/media/img/logos/logo-2.png"> -->
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">Sign In To Admin</h3>
									</div>
									<form class="m-login__form m-form" @submit.prevent="login">
                                        <div class="alert alert-danger alert-dismissible" role="alert" v-if="errors.invalid">
											<strong>Invalid </strong> {{ errors.invalid }}
                                        </div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="email" placeholder="Masukan Email Anda" v-model="data.email" autocomplete="off">
                                            <span class="m--font-danger" v-if="errors.email">{{ errors.email[0] }}</span>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Masukan Password Anda" v-model="data.password">
                                            <span class="m--font-danger" v-if="errors.password">{{ errors.password[0] }}</span>
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" v-model="data.remember_me"> Remember me
													<span></span>
												</label>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(../../../assets/app/media/img//bg/bg-4.jpg)">
					<div class="m-grid__item">
						<h3 class="m-login__welcome">Join Our Community</h3>
						<p class="m-login__msg">
							Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
						</p>
					</div>
				</div>
			</div>
		</div>
</template>

<script>
import { mapState } from 'vuex';
export default {
    name: 'Login',
    data() {
        return {
            data: {
                email: '',
                password: '',
                remember_me: false
            }
        }
    },
    created() {
        //KITA MELAKUKAN PENGECEKAN JIKA SUDAH LOGIN DIMANA VALUE isAuth BERNILAI TRUE
        if (this.$store.getters['isAuth']) {
            //MAKA DI-DIRECT KE ROUTE DENGAN NAME home
            this.$router.push({ name: 'SectionArticleIndex' })
        }
    },
    computed: {
            ...mapState(['errors'])
    },
    methods: {
        login() {
            this.$store.dispatch('auth/login', this.data);
        }
    },
	destroyed() {
        this.$store.dispatch('user/getUserLogin');
    }
}
</script>

<style>

</style>
