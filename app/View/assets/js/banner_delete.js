(function($, document) {
    'use strict';

    var BannerShortCode = function(){
      this.button = $('.delete_banner');
    }

    BannerShortCode.prototype.init = function () {
      this.button.on('click', this.deleteBanner.bind(this));
    };

    BannerShortCode.prototype.deleteBanner = function (e) {
      e.preventDefault();

      var banner = confirm("Você deseja Deletar esse Banner"),
      id= $(e.target).data('id');
      if (banner) {
          this.ajax({'action':'delete_banner','id':id})
      }
    };

    BannerShortCode.prototype.ajax = function($data){
        $.post(ajaxurl,$data)
        .success(function(data){
            location.reload();
        });
    };

    $(function(){
        (new BannerShortCode()).init();
    });


}(jQuery, document));
