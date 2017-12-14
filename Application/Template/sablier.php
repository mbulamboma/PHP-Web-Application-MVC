
<div class="lds-css">
<div class="lds-hourglass" style="width:100%;height:100%"></div>
<style type="text/css">

@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1)
  }
  100% {
    transform: rotate(1800deg)
  }
}

@-webkit-keyframes lds-hourglass {
  0% {
    -webkit-transform: rotate(0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }
  50% {
    -webkit-transform: rotate(900deg);
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1)
  }
  100% {
    -webkit-transform: rotate(1800deg)
  }
}

.lds-hourglass:after {
  content: " ";
  position: absolute;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: inline-block;
  background: center center no-repeat;
  background-size: cover;
  width: 0;
  height: 0;
  background: none;
  border-radius: 50%;
  border: 70px solid;
  border-color: gray transparent gray transparent;
  animation: lds-hourglass 2s linear infinite;
  -webkit-animation: lds-hourglass 2s linear infinite;
}
</style>
</div>

