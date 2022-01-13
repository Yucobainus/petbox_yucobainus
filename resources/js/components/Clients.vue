<template>
  <section>
    <div class="collection_section layout_padding">
      <div class="container">
        <h1 class="new_text"><strong>Счастливые владельцы</strong></h1>
      </div>
    </div>

    <div class="layout_padding gallery_section">
      <div class="container">
        <div class="row">
          <div v-for="item in content" :key="item.id" class="col-sm-4">
            <div class="best_shoes">
               <p class="best_text" style="font-weight: 700">{{item.initials}}</p>
              <p class="best_text">{{item.species}}</p>
              <div class="shoes_icon" style="max-height: 220px"><img style="height: 220px !important; object-fit: cover;" :src="item.photowithdog.replace('public/', '')" /></div>
              <div class="star_text">
                <div class="right_part">
                  <div class="shoes_price">
                    ₽ <span style="color: #ff4e5b">{{item.price}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      content: {}
    }
  },
  methods: {
    getLastWorks() {
      axios.get("api/get-completed-works/6").then(res => {
        this.content = res.data[1]
      })
    }
  },
  beforeMount() {
    this.getLastWorks()
  }
}
</script>

<style scoped>

</style>