<style>
.dsp2-slider.is-scrollable .dsp2-arrow,.dsp2-slider.dsp2-force-slider .dsp2-arrow{display:grid!important}.dsp2-review-slider{position:relative}.dsp2-review-arrow{position:absolute;z-index:5;top:50%;display:grid;place-items:center;width:40px;height:40px;margin-top:-20px;border:1px solid #e8e1f6;border-radius:50%;background:#fff;color:#5220bc;box-shadow:0 5px 18px rgba(55,24,120,.16);cursor:pointer;transition:.2s}.dsp2-review-arrow:hover{background:#5220bc;color:#fff}.dsp2-review-prev{left:8px}.dsp2-review-next{right:8px}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card:nth-child(2){background:#fff!important;color:#161d3d!important;transform:none;box-shadow:0 4px 15px rgba(25,17,48,.04)}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card:nth-child(2) .dsp2-quote{color:#5122bb}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card:nth-child(2) .dsp2-review-person small{color:#747b89}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card.is-active{background:linear-gradient(135deg,#642bd0,#4a20a9)!important;color:#fff!important;transform:translateY(-2px);box-shadow:0 12px 25px rgba(71,31,162,.22)}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card.is-active .dsp2-quote{color:#a98aef}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card.is-active .dsp2-review-person small{color:#d8cdf5}@media(max-width:700px){.dsp2-review-arrow{width:34px;height:34px}.dsp2-review-prev{left:4px}.dsp2-review-next{right:4px}}
</style>
<style>
/* Final emphasis and motion polish. */
.dsp-stat strong{font-size:16px!important;font-weight:800!important;letter-spacing:-.15px}.dsp-stat small{font-size:11px!important;line-height:1.4!important;font-weight:600}.dsp-stats{gap:28px!important}.dsp2-track,.dsp2-review-track{transition-property:transform!important;transition-duration:.7s!important;transition-timing-function:cubic-bezier(.22,.61,.36,1)!important}.dsp2-slider{padding-top:12px!important;padding-bottom:14px!important}.dsp2-review-slider{padding:14px 3px 12px!important}.dsp2-review-track{align-items:center}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card.is-active{transform:translateY(-9px) scale(1.025)!important;z-index:2;box-shadow:0 18px 36px rgba(71,31,162,.28)!important}.dsp2-expert-card{transition:transform .35s cubic-bezier(.22,.61,.36,1),box-shadow .35s ease,border-color .35s ease!important}@media(max-width:700px){.dsp-stat strong{font-size:15px!important}.dsp-stat small{font-size:10px!important}.dsp-stats{gap:18px!important}.dsp2-review-track.dsp2-slider-ready .dsp2-review-card.is-active{transform:translateY(-6px) scale(1.012)!important}}
</style>
<style>
.dsp-stat strong{font-size:20px!important;line-height:1.2!important;font-weight:800!important;letter-spacing:-.2px}.dsp-stat small{font-size:12px!important;line-height:1.45!important;font-weight:600;margin-top:7px!important}.dsp-stats{gap:32px!important;margin-top:30px!important;margin-bottom:30px!important}.dsp-stat{min-width:95px!important}@media(max-width:700px){.dsp-stat strong{font-size:18px!important}.dsp-stat small{font-size:11px!important}.dsp-stat{min-width:0!important}}
</style>
<style>
/* Stars were requested larger; keep hero statistics balanced. */
.dsp-stat strong{font-size:16px!important}.dsp-stat small{font-size:11px!important;margin-top:5px!important}.dsp-stats{gap:28px!important;margin-top:26px!important;margin-bottom:26px!important}.dsp-stat{min-width:82px!important}.dsp2-rating{font-size:15px!important;margin-top:11px!important;margin-bottom:11px!important}.dsp2-rating i{font-size:15px!important}.dsp2-review-person span{font-size:15px!important;line-height:1.2!important;letter-spacing:3px!important;margin-top:4px}.dsp2-review-person strong{font-size:11px!important}@media(max-width:700px){.dsp-stat strong{font-size:15px!important}.dsp-stat small{font-size:10px!important}.dsp2-rating,.dsp2-rating i{font-size:14px!important}.dsp2-review-person span{font-size:14px!important}}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){setTimeout(function(){
    document.querySelectorAll('[data-expert-slider]').forEach(function(slider){
        const track=slider.querySelector('.dsp2-track');
        let cards=[...track.children];
        const desktopVisible=5;
        while(cards.length && cards.length<=desktopVisible){cards.forEach(card=>track.appendChild(card.cloneNode(true)));cards=[...track.children]}
        let prev=slider.querySelector('.dsp2-prev'),next=slider.querySelector('.dsp2-next');
        const cleanPrev=prev.cloneNode(true),cleanNext=next.cloneNode(true);prev.replaceWith(cleanPrev);next.replaceWith(cleanNext);prev=cleanPrev;next=cleanNext;
        slider.classList.add('dsp2-force-slider','is-scrollable');let index=0,timer;
        function visible(){return window.innerWidth<=700?1:(window.innerWidth<=1100?3:5)}
        function update(){const all=[...track.children],max=Math.max(0,all.length-visible()),step=(all[0]?.getBoundingClientRect().width||0)+16;if(index>max)index=0;track.style.transform=`translateX(-${index*step}px)`}
        function go(direction){const max=Math.max(0,track.children.length-visible());index+=direction;if(index>max)index=0;if(index<0)index=max;update();restart()}
        function restart(){clearInterval(timer);timer=setInterval(()=>go(1),3500)}
        prev.onclick=()=>go(-1);next.onclick=()=>go(1);slider.addEventListener('mouseenter',()=>clearInterval(timer));slider.addEventListener('mouseleave',restart);window.addEventListener('resize',update);update();restart();
    });

    document.querySelectorAll('[data-review-slider]').forEach(function(slider){
        const track=slider.querySelector('.dsp2-review-track');let cards=[...track.children],originalCount=cards.length;if(!originalCount)return;
        while(cards.length<6){cards.forEach(card=>track.appendChild(card.cloneNode(true)));cards=[...track.children]}
        track.classList.add('dsp2-slider-ready');
        const prev=document.createElement('button'),next=document.createElement('button');prev.type=next.type='button';prev.className='dsp2-review-arrow dsp2-review-prev';next.className='dsp2-review-arrow dsp2-review-next';prev.setAttribute('aria-label','Previous reviews');next.setAttribute('aria-label','Next reviews');prev.innerHTML='<i class="fas fa-chevron-left"></i>';next.innerHTML='<i class="fas fa-chevron-right"></i>';slider.append(prev,next);
        const dots=slider.parentElement.querySelector('.dsp2-review-dots');dots.innerHTML='';for(let i=0;i<originalCount;i++){const dot=document.createElement('button');dot.type='button';dot.setAttribute('aria-label','Show review '+(i+1));dot.onclick=()=>{index=i+1;update();restart()};dots.appendChild(dot)}
        let index=1,timer;
        function update(){cards=[...track.children];const mobile=window.innerWidth<=700,gap=mobile?12:20,step=(cards[0]?.getBoundingClientRect().width||0)+gap,max=mobile?cards.length-1:cards.length-2;if(index>max)index=mobile?0:1;if(index<0)index=max;cards.forEach((card,i)=>card.classList.toggle('is-active',i===index));[...dots.children].forEach((dot,i)=>dot.classList.toggle('is-active',i===index%originalCount));const offset=mobile?index:Math.max(0,index-1);track.style.transform=`translateX(-${offset*step}px)`}
        function go(direction){index+=direction;update();restart()}
        function restart(){clearInterval(timer);timer=setInterval(()=>go(1),4000)}
        prev.onclick=()=>go(-1);next.onclick=()=>go(1);slider.addEventListener('mouseenter',()=>clearInterval(timer));slider.addEventListener('mouseleave',restart);window.addEventListener('resize',update);update();restart();
    });
    },0)});
</script>
