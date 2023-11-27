
  const showResultshop = document.querySelector('.showshop-result');
const searchBtnshop = document.querySelectorAll('.js-shopsearch-trigger');
const closeBtnshop = document.querySelector('.shopsearch-overlay__close');
const searchBoxshop = document.querySelector('.shopsearch-overlay');
const searchFeildshop = document.querySelector('#shopsearch-term');
let isOverlayOpenshop = false;
let isSpinnerOnshop = false;
let feildValshop;
let reqTimmershop;

openOverlay = function () {
  searchBoxshop.classList.add("shopsearch-overlay--active");
  searchFeildshop.value = '';
  showResultshop.innerHTML = '';
  setTimeout(() => { searchFeildshop.focus() }, 301)
  document.body.classList.add('fix-page');
  isOverlayOpenshop = true;
}
closeOverlay = function () {
  searchBoxshop.classList.remove('shopsearch-overlay--active');
  document.body.classList.remove('fix-page');
  isOverlayOpenshop = false;
}
openWithKey = function (e) {
  if (e.keyCode == 219 || e.keyCode == 175 && !isOverlayOpenshop) {
    openOverlay();
  }
  if (e.keyCode == 27 && isOverlayOpenshop) {
    closeOverlay();
  }
}


sendReq = function () {
  if (searchFeildshop.value) {
    if (feildValshop != searchFeildshop.value) {
      clearTimeout(reqTimmershop);
      if (!isSpinnerOnshop) {
        showResultshop.innerHTML = '<div class="spinner-loader"</div>';
        isSpinnerOnshop = true;
      }
      reqTimmershop = setTimeout(result, 800);
    }
  } else {
    showResultshop.innerHTML = '';
    isSpinnerOnshop = false;
  }


  feildValshop = searchFeildshop.value;
}
result = function () {
 
  fetch(uniData.siteUrl + '/wp-json/myshop/v1/info?search=' + searchFeildshop.value)
    .then((Response) => {
      if(Response.ok){console.log('ahad')}
      return Response.json();
    }).then((text) => {
      showResultshop.innerHTML = `
      <div class='row'>
      <div class='one-third'>
      <h2 class='search-overlay__section-title'>محصولات</h2>
      ${text.product.length ? "<ul class='link-list min-list'>" : '<p>نتیجه ای یافت نشد</p>'}
      ${text.product.map(post => `<li><a href='${post.link}'>${post.title}<img src="${post.imageurl}"></a></li>`).join('')}
      ${text.product.length ? '</ul>' : ''}
      </div>
      </div>
      `
    });



  

  isSpinnerOnshop = false


}


searchBtnshop.forEach((item)=>{
  item.addEventListener('click', openOverlay);
});
closeBtnshop.addEventListener('click', closeOverlay);
document.addEventListener('keyup', openWithKey);
searchFeildshop.addEventListener('keyup', sendReq);


    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;

        // دریافت همه عناصر با class="tabcontent" و مخفی کردن آنها
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }

        // دریافت همه عناصر با class="tablinks" و حذف class "active" از آنها
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // نمایش فعلی تب و افزودن یک class "active" به دکمه که تب را باز کرده است
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
 
    // slider is here ------------------->>>>>>>>>>>



    


