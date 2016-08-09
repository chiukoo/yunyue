(function(){

   var overImages = [];
   
   function setover2(){
     if(!document.images){return;}
     var imgs = document.images;
     var insert = [];
     for(var i=0,len=imgs.length; i<len; i++){
       var splitname = imgs[i].src.split('_nor.');
       if(splitname[1]){
         var overImg = document.createElement('img');
         overImages.push(overImg);
         overImg.src = splitname[0]+'_over.'+splitname[1];
         var alpha = 0;
         overImg.currentAlpha = alpha;
         overImg.style.opacity = alpha/100;
         overImg.style.filter = 'alpha(opacity='+alpha+')';
         overImg.style.position = 'absolute';


         addEvent(overImg,'mouseover',function(){setFader(this,100);});
         addEvent(overImg,'mouseout',function(){setFader(this,0);});


         insert[insert.length] = {position:imgs[i],element:overImg};
       }
     }

     for(i=0,len=insert.length; i<len ;i++){
       var parent = insert[i].position.parentNode;
       parent.insertBefore(insert[i].element,insert[i].position);
     }


     addEvent(window,'beforeunload', clearover);
   }



   function setFader(targetObj,targetAlpha){
     targetObj.targetAlpha = targetAlpha;
     if(targetObj.currentAlpha==undefined){
       targetObj.currentAlpha = 100;
     }
     if(targetObj.currentAlpha==targetObj.targetAlpha){
       return;
     }
     if(!targetObj.fading){
       if(!targetObj.fader){
         targetObj.fader = fader;
       }
       targetObj.fading = true;
       targetObj.fader();
     }
   }



   function fader(){
     this.currentAlpha += (this.targetAlpha - this.currentAlpha)*0.2;
     if(Math.abs(this.currentAlpha-this.targetAlpha)<1){
       this.currentAlpha = this.targetAlpha;
       this.fading = false;
     }
     var alpha = parseInt(this.currentAlpha);
     this.style.opacity = alpha/100;
     this.style.filter = 'alpha(opacity='+alpha+')';
     if(this.fading){
       var scope = this;
       setTimeout(function(){fader.apply(scope)},30);
     }
   }
   


   function clearover(){
     for(var i=0,len=overImages.length; i<len; i++){
       var image = overImages[i];
       image.style.opacity = 0;
       image.style.filter = 'alpha(opacity=0)';
     }
   }



   function addEvent(eventTarget, eventName, func){
     if(eventTarget.addEventListener){

       eventTarget.addEventListener(eventName, func, false);
     }else if(window.attachEvent){
       // IE
       eventTarget.attachEvent('on'+eventName, function(){func.apply(eventTarget);});
     }
   }

   addEvent(window,'load',setover2);

 })();
