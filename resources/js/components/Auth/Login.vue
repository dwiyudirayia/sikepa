<template>
    <form @submit.prevent="login">
        <div class="alert alert-danger alert-dismissible" role="alert" v-if="errors.invalid">
            <strong>Invalid </strong> {{ errors.invalid }}
        </div>
        <fieldset class="form-group position-relative" id="__BVID__38">
            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__38__BV_label_">Username</legend>
            <div tabindex="-1" role="group">
                <input type="text" class="form-control" id="__BVID__39" placeholder="Masukan Username Anda" v-model="data.username" autocomplete="off">
                <span class="m--font-danger" v-if="errors.username">{{ errors.username[0] }}</span>
            </div>
        </fieldset>
        <fieldset class="form-group position-relative" id="__BVID__42">
            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__42__BV_label_">
                <div class="d-flex justify-content-between align-items-end">
                    <div>Password</div>
                </div>
            </legend>
            <div tabindex="-1" role="group">
                <input type="password" class="form-control" id="__BVID__40" placeholder="Masukan Password Anda" v-model="data.password" autocomplete="off">
                <span class="m--font-danger" v-if="errors.password">{{ errors.password[0] }}</span>
            </div>
        </fieldset>
        <div class="d-flex justify-content-between align-items-center m-0">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
    </form>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: 'Login',
    data() {
        return {
            data: {
                username: '',
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
        window.location.href = '/dashboard';
    }
}
</script>

<!--CUSTOME CSS-->
<style>
    .authentication-wrapper {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        min-height: 100vh;
        width: 100%;
    }

    .authentication-wrapper .authentication-inner {
        width: 100%;
    }

    .authentication-wrapper.authentication-1,
    .authentication-wrapper.authentication-2,
    .authentication-wrapper.authentication-4 {
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .authentication-wrapper.authentication-1 .authentication-inner {
        max-width: 300px;
    }

    .authentication-wrapper.authentication-2 .authentication-inner {
        max-width: 380px;
    }

    .authentication-wrapper.authentication-3 {
        -ms-flex-align: stretch;
        align-items: stretch;
        -ms-flex-pack: stretch;
        justify-content: stretch;
    }

    .authentication-wrapper.authentication-3 .authentication-inner {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: stretch;
        align-items: stretch;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -ms-flex-pack: stretch;
        justify-content: stretch;
    }

    .authentication-wrapper.authentication-4 .authentication-inner {
        max-width: 800px;
    }

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .authentication-wrapper:after {
            content: '';
            display: block;
            -ms-flex: 0 0 0%;
            flex: 0 0 0%;
            min-height: inherit;
            width: 0;
            font-size: 0;
        }
    }
	.authentication-wrapper.authentication-2 {
		flex-direction: column;
	}

	.title-inner {
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		text-align: center;
		width: 100%;
		height: 100%;
		color: #fff;
	}

	.title-inner .title-app h1 {
		text-transform: uppercase;
		font-weight: 700;
		letter-spacing: 3px;
	}

	.title-inner .title-app h5 {
		border-radius: 5px;
		font-weight: 400;
	}

	.title-app hr {
			border-color: #fff;
	}

	.bg-customize {
		background-size: cover;
		background-position: center center;
		background-repeat: no-repeat;;
	}

	.bg-customize:after {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background-color: rgba(94,75,220, .3);
	}

	@media screen and (min-width: 1199.98px) {
		.card {
			padding: 7em !important;
		}
	}

	@media screen and (min-width: 991.98px) {
		.authentication-wrapper.authentication-2 {
			height: 100vh;
			justify-content:space-between;
			flex-direction: row;
		}

		.authentication-wrapper.authentication-2 .authentication-inner {
			max-width: 40%;
			height: 100%;
			padding: 0 !important;
		}

		.title-inner::before {
			position: fixed;
			content: "SIKEPA";
			font-weight: 700;
			mix-blend-mode: overlay;
			z-index: 2;
			color: #fff;
			font-size: 10vw;
			opacity: .2;
			top: 50%;
			left: 30px;
		}

		.card {
			height: 100%;
			justify-content: center;
			border-radius: 0;
		}

		.title-inner {
			width: 60%;
			align-items: flex-start;
			justify-content: flex-end;
			padding: 0 0 7em 0;
			text-align: right;

		}

		.title-inner .title-app {
			position: relative;
			padding: 3em 0 3em 10em;
			text-align: right;
		}

		.title-app hr {
			border-color: #fff;
			position: absolute;
			top: 50%;
			width: 100%;
			left: 0;
			top: 50%;
			transform: translate(0,-50%);
		}

		.title-inner .title-app h1 {
			font-size: 3em;
		}

		.title-inner .title-app h1 {
			padding-bottom: 25px;
			margin-bottom: 0;
		}

		.title-inner .title-app h5 {
			margin-bottom: 0;
			padding-top: 25px;
		}
	}

	@media screen and (max-width: 575.98px){
		.authentication-wrapper.authentication-2 {
			padding: 0 20px;
		}
	}

</style>
<style scoped src="./../../../sass/admin/dist/vendor/fonts/fontawesome.css"></style>
<style scoped src="./../../../sass/admin/dist/vendor/fonts/ionicons.css"></style>
<style scoped src="./../../../sass/admin/dist/vendor/fonts/linearicons.css"></style>
<style scoped src="./../../../sass/admin/dist/css/bootstrap.css"></style>
<style scoped src="./../../../sass/admin/dist/css/appwork.css"></style>
<style scoped src="./../../../sass/admin/dist/css/theme-app.css"></style>
<style scoped src="./../../../sass/admin/dist/css/colors.css"></style>
<style scoped src="./../../../sass/admin/dist/css/uikit.css"></style>
<style scoped src="./../../../sass/admin/dist/css/style.css"></style>
