<template>
  <div class="admin-content ml-1">
    <div v-for="item in content" class="content-item" :key="item.id">
      <div class="content-header">
        <div class="content-property">
          <span class="initials">{{ item.initials }}</span>
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
          <span class="prop-title">Телефон клиента: </span> {{ item.phone }}
        </div>
        <div class="content-property main-content">
          <span class="prop-title">От носа до основания хвоста: </span>
          {{ item.height }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Высота от земли до локтевого сгиба: </span>
          {{ item.arm }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Ширина в плечах: </span>
          {{ item.width }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Высота стоящего животного: </span>
          {{ item.fullheight }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Высота переноски: </span>
          {{ item.boxheight }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Длина переноски: </span>
          {{ item.boxlength }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Ширина переноски: </span>
          {{ item.width }} см
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Email клиента: </span> {{ item.mail }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    showed: {
      type: Boolean,
      required: true,
    },
  },
  data() {
    return {
      content: {},
      isShowed: this.showed,
    };
  },
  methods: {
    getOrders() {
      axios.get("api/all-orders").then((res) => {
        this.content = res.data[1];
        this.isShowOrders = !this.isShowOrders;
      });
    },
    changeStatus(id) {
      axios.get(`api/status/${id}`).then((res) => {
        this.getOrders();
      });
    },
  },
  beforeMount() {
    this.getOrders();
  },
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