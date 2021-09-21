# 跨域

## 为什么会出现跨域

跨域实际上是一个浏览器的同源限制。

所以，有的同学会问，我使用 CURL 访问不会跨域，而使用浏览器却会跨域，这是为什么？

那是因为本来接口调用就没有跨域这么一说，只不过你在浏览器里调用接口，是你使用的浏览器限制了你，才会出现跨域的问题。

## 解决跨域

### 服务端返回解决跨域的 HTTP 头

这是一种最常见的解决思路，那就是服务端直接返回对应的 `Header`。

[这里](https://hyperf.wiki/2.2/#/zh-cn/middleware/middleware?id=%e8%b7%a8%e5%9f%9f%e4%b8%ad%e9%97%b4%e4%bb%b6) 提到了两个思路，也都是这种解决方式。

### 前端自行处理

将接口全部躲过代理的方式，转发到目标服务器。

- 开发阶段可以使用 VUE 的 devServer
- 线上阶段可以使用 Nginx 代理

