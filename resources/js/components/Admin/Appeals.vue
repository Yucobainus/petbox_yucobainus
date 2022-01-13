<template>
  <div class="admin-content ml-1">
    <div v-for="item in content" class="content-item" :key="item.id">
      <div class="content-header">
        <div class="content-property">
          <span class="initials">{{ item.initial }}</span>
        </div>
        <div
          class="content-property status btn"
          v-bind:class="{
            'btn-danger': item.status == 'Закрыта',
            'btn-warning': item.status == 'Обработана',
            'btn-success': item.status == 'Новая',
          }"
          @click="changeStatus(item.id)"
        >
          Статус: {{ item.status }}
        </div>
      </div>
      <div class="full-content">
        <div class="content-property main-content">
          <span class="prop-title">Телефон клиента: </span> {{ item.number }}
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Email клиента: </span> {{ item.email }}
        </div>
         <div class="content-property main-content">
          <span class="prop-title">Вопрос: </span> {{ item.appeal }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      content: {},
    };
  },
  methods: {
    getAppeals() {
      axios.get("api/get-all-appeals").then((res) => {
        this.content = res.data[1];
      });
    },
    changeStatus(id) {
      axios.get(`api/appeal-status/${id}`).then((res) => {
        this.getAppeals();
      });
    },
  },
  mounted() {
      this.getAppeals()
  }
};
</script>

<style scoped>
.c-btn {
  background-color: #ff4e5b;
  color: white;
  padding: 5px;
  border-radius: 5px;
}

.c-input {
  border: 1px solid #ff4e5b;
  outline: none;
}

.main-content {
  border: 1px solid #ff4e5b;
  padding: 5px;
  margin-bottom: 10px;
}

.prop-title {
  color: #ff4e5b;
  font-weight: 700;
}

.status {
  padding: 5px;
  border-radius: 5px;
  box-shadow: 3px 2px 5px 0px rgba(255, 78, 91, 0.75);
  -webkit-box-shadow: 3px 2px 5px 0px rgba(255, 78, 91, 0.75);
  -moz-box-shadow: 3px 2px 5px 0px rgba(255, 78, 91, 0.75);
  transition: 0.1s;
}

.status:hover {
  cursor: pointer;
}

.initials {
  text-decoration: underline;
  font-weight: 700 !important;
}

.content-item {
  margin: 10px;
  padding: 20px;
  border-radius: 15px;
}

.content-item {
  background-color: white;
}

.content-header {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  color: #ff4e5b !important;
  justify-content: space-around;
}
</style>