@@ -1,5 +1,5 @@
 /**
- * Lightbox v2.7.1
+ * Lightbox v2.7.2
  * by Lokesh Dhakar - http://lokeshdhakar.com/projects/lightbox2/
  *
  * @license http://creativecommons.org/licenses/by/2.5/
 @@ -21,7 +21,7 @@
       this.alwaysShowNavOnTouchDevices = false;
       this.wrapAround                  = false;
     }
-    
+
     // Change to localize to non-english language
     LightboxOptions.prototype.albumLabel = function(curImageNum, albumSize) {
       return "Image " + curImageNum + " of " + albumSize;
 @@ -58,8 +58,8 @@
     // Attach event handlers to the new DOM elements. click click click
     Lightbox.prototype.build = function() {
       var self = this;
-      $("<div id='lightboxOverlay' class='lightboxOverlay'></div><div id='lightbox' class='lightbox'><div class='lb-outerContainer'><div class='lb-container'><img class='lb-image' src='' /><div class='lb-nav'><a class='lb-prev' href='' ></a><a class='lb-next' href='' ></a></div><div class='lb-loader'><a class='lb-cancel'></a></div></div></div><div class='lb-dataContainer'><div class='lb-data'><div class='lb-details'><span class='lb-caption'></span><span class='lb-number'></span></div><div class='lb-closeContainer'><a class='lb-close'></a></div></div></div></div>").appendTo($('body'));
-      
+      $("<div id='lightboxOverlay' class='lightboxOverlay'></div><div id='lightbox' class='lightbox'><div class='lb-outerContainer'><div class='lb-container'><img class='lb-image' src='' /><div class='lb-nav'><a class='lb-prev' href='' ></a><a class='lb-next' href='' ></a></div><div class='lb-loader'><a class='lb-cancel'></a></div><a class='lb-download' href='' target='_blank'></a></div></div><div class='lb-dataContainer'><div class='lb-data'><div class='lb-details'><span class='lb-caption'></span><span class='lb-number'></span></div><div class='lb-closeContainer'><a class='lb-close'></a></div></div></div></div>").appendTo($('body'));
+
       // Cache jQuery objects
       this.$lightbox       = $('#lightbox');
       this.$overlay        = $('#lightboxOverlay');
 @@ -71,7 +71,7 @@
       this.containerRightPadding = parseInt(this.$container.css('padding-right'), 10);
       this.containerBottomPadding = parseInt(this.$container.css('padding-bottom'), 10);
       this.containerLeftPadding = parseInt(this.$container.css('padding-left'), 10);
-      
+
       // Attach event handlers to the newly minted DOM elements
       this.$overlay.hide().on('click', function() {
         self.end();
 @@ -114,6 +114,10 @@
         self.end();
         return false;
       });
+
+      this.$lightbox.find('.lb-download').on('click', function (e) {
+        window.open(e.target.href);
+      });
     };
 
     // Show overlay and lightbox. If the image is part of a set, add siblings to album array.
 @@ -166,7 +170,7 @@
           }
         }
       }
-      
+
       // Position Lightbox
       var top  = $window.scrollTop() + this.options.positionFromTop;
       var left = $window.scrollLeft();
 @@ -184,6 +188,7 @@
 
       this.disableKeyboardNav();
       var $image = this.$lightbox.find('.lb-image');
+      var $downloadLink = this.$lightbox.find('.lb-download');
 
       this.$overlay.fadeIn(this.options.fadeDuration);
 
 @@ -197,12 +202,13 @@
       preloader.onload = function() {
         var $preloader, imageHeight, imageWidth, maxImageHeight, maxImageWidth, windowHeight, windowWidth;
         $image.attr('src', self.album[imageNumber].link);
+        $downloadLink.attr('href', self.album[imageNumber].link);
 
         $preloader = $(preloader);
 
         $image.width(preloader.width);
         $image.height(preloader.height);
-        
+
         if (self.options.fitImagesInViewport) {
           // Fit image inside the viewport.
           // Take into account the border around the image and an additional 10px gutter on each side.
 @@ -244,12 +250,12 @@
     // Animate the size of the lightbox to fit the image we are showing
     Lightbox.prototype.sizeContainer = function(imageWidth, imageHeight) {
       var self = this;
-      
+
       var oldWidth  = this.$outerContainer.outerWidth();
       var oldHeight = this.$outerContainer.outerHeight();
       var newWidth  = imageWidth + this.containerLeftPadding + this.containerRightPadding;
       var newHeight = imageHeight + this.containerTopPadding + this.containerBottomPadding;
-      
+
       function postResize() {
         self.$lightbox.find('.lb-dataContainer').width(newWidth);
         self.$lightbox.find('.lb-prevLink').height(newHeight);
 @@ -273,7 +279,7 @@
     Lightbox.prototype.showImage = function() {
       this.$lightbox.find('.lb-loader').hide();
       this.$lightbox.find('.lb-image').fadeIn('slow');
-    
+
       this.updateNav();
       this.updateDetails();
       this.preloadNeighboringImages();
 @@ -330,15 +336,15 @@
             location.href = $(this).attr('href');
           });
       }
-    
+
       if (this.album.length > 1 && this.options.showImageNumberLabel) {
         this.$lightbox.find('.lb-number').text(this.options.albumLabel(this.currentImageIndex + 1, this.album.length)).fadeIn('fast');
       } else {
         this.$lightbox.find('.lb-number').hide();
       }
-    
+
       this.$outerContainer.removeClass('animating');
-    
+
       this.$lightbox.find('.lb-dataContainer').fadeIn(this.options.resizeDuration, function() {
         return self.sizeOverlay();
       });
