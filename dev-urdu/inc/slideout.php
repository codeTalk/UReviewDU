    <script type="text/javascript">
    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: 'img/feedback_tab.png', //path to the image for the tab //Optionally can be set using css
            imageHeight: '100px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '40px',                       //width of tab image            //Optionally can be set using css
            tabLocation: 'left',                      //side of screen where tab lives, top, right, bottom, or left
            speed: 300,                               //speed of animation
            action: 'hover',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '200px',                          //position from the top/ use if tabLocation is left or right
            leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: false                      //options: true makes it stick(fixed position) on scroll
        });

    });

    </script>