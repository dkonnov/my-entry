<template>
<div>
<img height="1" width="1" id="srcPixel" style="display:none"  src=""/>
</div>
</template>

<script>
export default {
  name: 'integrationPixel',
  data () {
    return {
      counter: '2394012147354021',
     }
  },
  mounted(){
    fbq('init', '2394012147354021');
    fbq('track', 'PageView');
  //  document.getElementById('srcPixel').src = 'https://www.facebook.com/tr?id=' + this.counter + '&ev=PageView&noscript=1';
  }

}
</script>
