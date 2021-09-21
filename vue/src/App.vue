<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import hello from "./api/hello";

export default {
  name: 'App',
  components: {
    HelloWorld
  },
  async mounted() {
    // const res = await hello.hello();
    // console.log(res);
    // await hello.hello404();

    const res = await hello.hi200();
    console.log(res);
    await hello.hi404();
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
