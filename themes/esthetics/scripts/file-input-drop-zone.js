$.fn.extend({
  fileInputDropZone: function(options) {
    var setPreview, settings, updatePreview;
    settings = {
      disablePreview: false,
      selectImg: function($dropZone) {
        return $dropZone.find('img');
      },
      selectInput: function($dropZone) {
        return $dropZone.parent().find(':file');
      }
    };
    settings = $.extend(settings, options);
    setPreview = function($img, content) {
      if ($img) {
        if ($img[0].tagName === 'IMG') {
          return $img.prop('src', content);
        } else {
          return $img.css({
            'background-image': 'url(' + content + ')',
            'background-repeat': 'no-repeat'
          });
        }
      }
    };
    updatePreview = function($img, file) {
      var reader;
      if (!settings.disablePreview && $img) {
        if (file.type.match(/image[\/\-\w]*/)) {
          reader = new FileReader();
          reader.onload = function(ev) {
            return setPreview($img, ev.target.result);
          };
          return reader.readAsDataURL(file);
        } else {
          return setPreview($img, '');
        }
      }
    };
    return this.each(function() {
      var $dropZone, $img, $input;
      $dropZone = $(this);
      if (!settings.disablePreview) {
        $img = settings.selectImg($dropZone);
      }
      $input = settings.selectInput($dropZone);
      this.ondrop = function(e) {
        var files;
        if (e.dataTransfer && (files = e.dataTransfer.files)) {
          $input.prop('files', files);
          if ($input.prop('files') === files) {
            e.preventDefault();
            updatePreview($img, files[0]);
            return false;
          }
        }
      };
      this.ondragover = function(e) {
        if (e.dataTransfer && e.dataTransfer.files) {
          return e.preventDefault();
        }
      };
      return $input.change(function() {
        var files;
        if ((files = this.files)) {
          return updatePreview($img, files[0]);
        } else {
          return setPreview($img, '');
        }
      });
    });
  }
});

$(function() {
     var fakeFileUpload = $('<div>', {'class':'fakefile'});
    fakeFileUpload.append('<input>');
    var image = $('<a href="#" class="grey display_but"><i class="icon-search"></i> Search </a>');
    fakeFileUpload.append(image);
    $('input[type="file"]').each( function() {
        var $input = $(this);
        if (!$input.parent().hasClass('fileinputs')) return true;
        $input.addClass('file hidden');
        var $clone = fakeFileUpload.clone(true);
        $input.parent().append($clone);
        $input[0].relatedElement = $clone.find('input').eq(0);
        $input.on('change mouseout', function () {
            var $el = $(this)
            $el[0].relatedElement.val($el.val());
        });
    });
  
   var ret = $('.file-input-drop-zone').fileInputDropZone();
   $('.fileinputs').show();
});
