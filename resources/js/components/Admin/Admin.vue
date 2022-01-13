<template>
  <section class="admin-wrapper">
    <div class="pt-5 pl-2 pr-2 d-flex flex-row" v-if="authorized">
      <div class="admin-side-bar">
        <div class="nav-item" @click="showOrders()">Все заказы</div>
        <hr class="nav-line" />
        <div class="nav-item" @click="showCompletedMenu = !showCompletedMenu">
          Готовые работы
        </div>
        <div class="nav-sub-items-wrapper" v-show="showCompletedMenu">
          <div class="nav-sub-item" @click="showCompletedForm()">
            Добавить готовую работу
          </div>
          <div class="nav-sub-item" @click="showCompletedList()">
            Список сделанных работ
          </div>
        </div>
        <hr class="nav-line" />
        <div class="nav-item" @click="showAppeals()">Вопросы</div>
        <hr class="nav-line" />
        <div class="nav-item" @click="showSlides()">Слайдер</div>
        <button @click="logout()" class="custom-btn btn exit-btn">Выйти</button>
      </div>

      <vue-orders v-if="isShowOrders"></vue-orders>

      <vue-completed-form v-if="isShowCompleteForm"> </vue-completed-form>

      <vue-c-list v-if="isShowCompletedList" @getOneWork="getOneWork()"></vue-c-list>

      <vue-appeals v-if="isShowAppeals"></vue-appeals>

      <vue-admin-slider v-if="isShowSlider"></vue-admin-slider>

      <vue-change-form
        v-if="isShowChangeForm"
        :work="workToChange"
      ></vue-change-form>
    </div>

    <div class="container p-5" v-else>
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Введите логин</label>
          <input
            type="text"
            class="form-control"
            placeholder="Имя пользователя"
            v-model="name"
          />
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Пароль</label>
          <input
            type="password"
            class="form-control"
            placeholder="Пароль"
            v-model="password"
          />
        </div>
        <div
          class="text-danger mb-3 p-1 border border-danger"
          v-if="validateError"
        >
          {{ errorTitle }}
        </div>
        <button @click="login()" class="btn custom-btn">Войти</button>
      </form>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      authorized: null,
      test: "aaa",
      name: "",
      password: "",
      validateError: false,
      errorTitle: "",
      isShowOrders: false,
      isShowCompleteForm: false,
      isShowCompletedList: false,
      isShowAppeals: false,
      isShowSlider: false,
      showCompletedMenu: false,
      workToChange: {},
      isShowChangeForm: false,
    };
  },
  methods: {
    checkAuth() {
      axios.get("api/auth").then((res) => {
        this.authorized = res.data.authorized;
      });
    },
    login() {
      axios
        .post("api/login", {
          name: this.name,
          password: this.password,
        })
        .then((res) => {
          if (res.data.answer == false) {
            this.validateError = true;
            this.errorTitle = res.data.errors;
          } else {
            this.checkAuth();
          }
        });
    },
    logout() {
      axios.get("api/out").then((res) => {
        this.checkAuth();
      });
    },
    getOrders() {
      axios.get("api/all-orders").then((res) => {
        this.content = res.data[1];
      });
    },
    showAppeals() {
      this.isShowAppeals = !this.isShowAppeals;
      this.isShowOrders = false;
      this.isShowCompleteForm = false;
      this.isShowCompletedList = false;
      this.isShowSlider = false;
    },
    showOrders() {
      this.isShowOrders = !this.isShowOrders;
      this.isShowAppeals = false;
      this.isShowCompleteForm = false;
      this.isShowCompletedList = false;
      this.isShowSlider = false;
    },
    showCompletedForm() {
      this.isShowCompleteForm = !this.isShowCompleteForm;
      this.isShowOrders = false;
      this.isShowAppeals = false;
      this.isShowCompletedList = false;
      this.isShowSlider = false;
    },
    showCompletedList() {
      this.isShowCompletedList = !this.isShowCompletedList;
      this.isShowOrders = false;
      this.isShowAppeals = false;
      this.isShowCompleteForm = false;
      this.isShowSlider = false;
    },
    showSlides() {
      this.isShowSlider = !this.isShowSlider;
      this.isShowOrders = false;
      this.isShowAppeals = false;
      this.isShowCompleteForm = false;
      this.isShowCompletedList = false;
    },
    getOneWork(id) {
      console.log(id)
      axios
        .get(`api/one-work/${id}`)
        .then((res) => {
          console.log(res.data)
          this.workToChange = res.data;
          this.isShowChangeForm = true;
          this.isShowCompletedList = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  beforeMount() {
    this.checkAuth();
  },
};
</script>

<style scoped>
.admin-content {
  display: flex;
  flex-wrap: wrap;
  color: black !important;
}

.admin-wrapper {
  background-color: #ff4e5b;
  width: 100vw;
  min-height: 100vh;
}

.admin-side-bar {
  display: flex;
  flex-direction: column;
  padding: 10px;
  width: 20%;
  border-radius: 10px;
  height: 90vh;
  background-color: white !important;
}

.nav-item {
  color: black;
  font-size: 20px;
  font-weight: 600;
}

.nav-line {
  border: 1px solid #ff4e5b !important;
  width: 90%;
  margin: 1px auto !important;
}

.nav-sub-items-wrapper {
  background-color: black;
  padding: 5px;
  border-radius: 5px;
  color: white;
  margin-bottom: 10px;
}

.nav-item:hover,
.nav-sub-item:hover {
  cursor: pointer;
}

.exit-btn {
  margin-bottom: 0;
  margin-top: auto;
}

form {
  max-width: 500px;
  margin: 0px auto;
  background: white;
  padding: 15px;
  border-radius: 10px;
}

form input,
form label {
  color: #ff4e5b !important;
  font-weight: 500 !important;
}

.custom-btn {
  background-color: #ff4e5b;
  color: white;
  border: none;
}
</style>