;(function(d){d.scrollShow={defaults:{elements:'img',itemSize:{height:200,width:200},view:null,navigators:null,navigationMode:'s',speed:600,wrappers:'simple',circular:false,easing:'linear',axis:'x',margin:true,start:null,setWidth:false}};function p(a,c,f){switch(c){case'crop':a=a.wrap('<div class="jq-ss-crop">').parent().css('overflow','hidden');case'resize':return a.css(f);case'simple':return a.wrap('<div class="jq-ss-simple">').parent();case'anchor':return a.wrap('<a class="jq-ss-anchor">').parent().each(function(){this.href='#'+this.firstChild.id});case'link':if(a.is('img'))return a.wrap('<a target="_blank" class="jq-ss-link">').parent().each(function(){this.href=this.firstChild.src});default:return a}};d.fn.scrollShow=function(b){b=d.extend({},d.scrollShow.defaults,b);return this.each(function(){var l=this,h=b.view?d(b.view,this):this,e=d(b.elements,h),g=e.length,i=0;d.each(b.wrappers.split(/\s*,\s*/),function(a,c){e=p(e,c,b.itemSize)});e.css(b.itemSize);if(!b.navigators){b.navigators='';b.navigationMode='r'}if(b.navigators.constructor!=Array)b.navigators=[b.navigators];d.each(b.navigationMode.split(''),function(a,c){switch(c){case's':d(b.navigators[a],l).eq(0).bind('click',{dir:-1},m).end().eq(1).bind('click',{dir:+1},m);break;case'r':var f=d(b.navigators[a]||e,l),n=f.length&&e.length/f.length;if(n)f.each(function(pos){d(this).bind('click',{pos:Math.floor(n*pos)},k)});break;case'l':if(d.fn.localScroll)d(b.navigators[a],l).localScroll(b);break}});(function(a,c){var f=(a.width()+o('margin')+o('padding')+j('border'));do c-=f;while(c>0&&g--);if(!b.setWidth)return;do{a=a.parent();if(a[0]==h[0])return}while(a.length>1);a.width(f*e.length)})(e,h.width());if(b.start!=null)k(b.start);function o(a){return j(a+'Left')+j(a+'Right')};function j(a){return parseInt(e.css(a))||0};function m(a){return k.call(this,i+a.data.dir)};function k(a){var c=a.data?a.data.pos:a;if(c<0)c=i==0&&b.circular?g:0;else if(c>g)c=i==g&&b.circular?0:g;h.stop().scrollTo(e[c],b);i=c;if(this.blur)this.blur();return false}})}})(jQuery);