    <footer>
        <div class="container">
            <div class="row">
                <a href="/kontakty/">
                    <div class="footer_contacts col-md-4 col-sm-6 col-xs-12">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><p>г. Екатеринбург, <br />ул. 8 Марта 1, офис 1</p>
                        <i class="fa fa-phone" aria-hidden="true"></i><p><a href="tel:+7 (343) 359-42-33">+7 (343) 359-44-26 </a><br /><a href="tel:+7 (343) 359-42-33">+7 (343) 359-42-33</a><br /><a href="tel:+7 (343) 371-85-01">+7 (343) 371-85-01</a></p>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i><p><a href="mailto:finservis2003@mail.ru">finservis2003@mail.ru</a><br /> <a href="mailto:finservis2012@mail.ru">finservis2012@mail.ru</a></p>
                    </div>
                </a>
                <?wp_nav_menu( array(
                    'theme_location'  => 'footer_left',
                    'menu'            => 'footer_left', 
                    'container'       => 'div', 
                    'container_class' => 'footer_nav col-md-4 col-sm-8 col-xs-8',
                ) );?>
                <?wp_nav_menu( array(
                    'theme_location'  => 'footer_right',
                    'menu'            => 'footer_right', 
                    'container'       => 'div', 
                    'container_class' => 'footer_bottom_nav col-md-4 col-sm-4 col-xs-4',
                ) );?>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <a href="http://web.ra-kolibri.com"  target="_blank"><div class="logo"></div></a>
                <div class="copyright_caption">Разработка сайта - <a href="http://web.ra-kolibri.com" target="_blank">РА «Колибри»</a></div>
            </div>
        </div>
    </footer>
    <style>
        div.wpcf7-response-output{
            margin: 2em 0 1em;
        }
        .submit-button{
            text-align: center;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Напишите нам письмо!</h4>
          </div>
          <div class="modal-body">
            <?=do_shortcode('[contact-form-7 id="152" title="Связаться с нами"]');?>
          </div>
        </div>
      </div>
    </div>
   <?php wp_footer(); ?>

</body>
</html>