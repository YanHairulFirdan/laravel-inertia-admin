<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { asset } from "@/functions";
import BootstrapInput from "@/Components/UI/Form/Inputs/BootstrapInput.vue";
import { ref } from "vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <Head title="Log in" />

  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div
          class="
            col-12 col-sm-8
            offset-sm-2
            col-md-6
            offset-md-3
            col-lg-6
            offset-lg-3
            col-xl-4
            offset-xl-4
          "
        >
          <div class="login-brand">
            <img
              :src="asset('stisla-master/assets/img/stisla-fill.svg')"
              alt="logo"
              width="100"
              class="shadow-light rounded-circle"
            />
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login</h4></div>

            <div class="card-body">
              <form @submit.prevent="submit">
                <BootstrapInput
                  labelText="Email"
                  type="email"
                  :modelValue="form.email"
                  v-model="form.email"
                  :required="true"
                  :errorMessage="form.errors.email"
                >
                </BootstrapInput>
                <BootstrapInput
                  type="password"
                  labelText="Password"
                  :modelValue="form.password"
                  v-model="form.password"
                  :required="true"
                  :errorMessage="form.errors.password"
                >
                </BootstrapInput>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      name="remember"
                      class="custom-control-input"
                      tabindex="3"
                      id="remember-me"
                    />
                    <label class="custom-control-label" for="remember-me"
                      >Remember Me</label
                    >
                  </div>
                </div>

                <div class="form-group">
                  <button
                    type="submit"
                    class="btn btn-primary btn-lg btn-block"
                    tabindex="4"
                  >
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">Copyright &copy; Stisla 2018</div>
        </div>
      </div>
    </div>
  </section>
</template>
