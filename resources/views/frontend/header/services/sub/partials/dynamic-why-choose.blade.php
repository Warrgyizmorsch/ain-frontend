@if($page->why_heading || !empty($page->why_items))
<section class="dsp3-why"><div class="dsp-wrap">
    <div class="dsp3-why-heading">
        <h2>{{ $page->why_heading }}</h2>
        @if($page->why_subheading)<p>{{ $page->why_subheading }}</p>@endif
    </div>
    @if(!empty($page->why_items))
    <div class="dsp3-why-grid">
        @foreach($page->why_items as $item)
        <article class="dsp3-why-item">
            <span class="dsp3-why-icon"><i class="{{ $item['icon'] ?: 'fas fa-check' }}"></i></span>
            <div><h3>{{ $item['heading'] }}</h3><p>{{ $item['content'] }}</p></div>
        </article>
        @endforeach
    </div>
    @endif
</div></section>
@endif
<style>
.dsp>.dsp-content{display:none!important}.dsp>.dsp3-why{order:6}.dsp3-why{padding:34px 0 42px;border-top:1px solid #f2eff7;background:#fff}.dsp3-why-heading{max-width:920px;margin:0 auto 26px;text-align:center}.dsp3-why-heading h2{margin:0 0 10px!important;color:#101838;font-size:25px!important;line-height:1.25!important;font-weight:800!important}.dsp3-why-heading p{margin:0!important;color:#555d6c;font-size:13px!important;line-height:1.65!important}.dsp3-why-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:26px 65px;max-width:1120px;margin:auto}.dsp3-why-item{display:grid;grid-template-columns:54px 1fr;gap:15px;align-items:start}.dsp3-why-icon{display:grid;place-items:center;width:50px;height:50px;border-radius:50%;background:#f2edff;color:#5220bd;box-shadow:0 5px 15px rgba(78,31,181,.09)}.dsp3-why-icon i{font-size:21px!important;font-weight:900}.dsp3-why-item h3{margin:0 0 6px!important;color:#151b36;font-size:15px!important;line-height:1.3!important;font-weight:800!important}.dsp3-why-item p{margin:0!important;color:#555d6c;font-size:12px!important;line-height:1.6!important}@media(max-width:750px){.dsp3-why{padding:28px 0 34px}.dsp3-why-grid{grid-template-columns:1fr;gap:22px}.dsp3-why-heading h2{font-size:22px!important}.dsp3-why-heading p{font-size:12px!important}.dsp3-why-item{grid-template-columns:48px 1fr;gap:12px}.dsp3-why-icon{width:45px;height:45px}.dsp3-why-icon i{font-size:19px!important}}
</style>
