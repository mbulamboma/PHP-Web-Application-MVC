  <div class="lds-css">
  <div style="width:100%;height:100%" class="lds-ellipsis">
    <div>
      <div></div>
    </div>
    <div>
      <div></div>
    </div>
    <div>
      <div></div>
    </div>
    <div>
      <div></div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
<style type="text/css">@-webkit-keyframes lds-ellipsis3 {
  0%, 25% {
    left: 32px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  50% {
    left: 32px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  75% {
    left: 100px;
  }
  100% {
    left: 168px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0%, 25% {
    left: 32px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  50% {
    left: 32px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  75% {
    left: 100px;
  }
  100% {
    left: 168px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@-webkit-keyframes lds-ellipsis2 {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  25%, 100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  25%, 100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
}
@-webkit-keyframes lds-ellipsis {
  0% {
    left: 32px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  25% {
    left: 32px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    left: 100px;
  }
  75% {
    left: 168px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  100% {
    left: 168px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
}
@keyframes lds-ellipsis {
  0% {
    left: 32px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  25% {
    left: 32px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    left: 100px;
  }
  75% {
    left: 168px;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  100% {
    left: 168px;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
}
.lds-ellipsis {
  position: relative;
}
.lds-ellipsis > div {
  position: absolute;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 32px;
  height: 32px;
}
.lds-ellipsis div > div {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: #f00;
  position: absolute;
  top: 100px;
  left: 32px;
  -webkit-animation: lds-ellipsis 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
  animation: lds-ellipsis 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
}
.lds-ellipsis div:nth-child(1) div {
  -webkit-animation: lds-ellipsis2 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
  animation: lds-ellipsis2 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
  background: yellow;
}
.lds-ellipsis div:nth-child(2) div {
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
  background: orange;
}
.lds-ellipsis div:nth-child(3) div {
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
  background: gray;
}
.lds-ellipsis div:nth-child(4) div {
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  background: blue;
}
.lds-ellipsis div:nth-child(5) div {
  -webkit-animation: lds-ellipsis3 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
  animation: lds-ellipsis3 1.6s cubic-bezier(0, 0.5, 0.5, 1) infinite forwards;
  background: red;
}
</style></div>

  