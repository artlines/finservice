
<?/**
 * Template name: Главная
 */ get_header(); ?>
   <?=do_shortcode('[owl-carousel category="main_banner" singleItem="true" autoPlay="true"]');?>
    <section class="top_sales container">
        <h2>Топ продаж</h2>
        <div class="row">
        <? $posts = get_posts([
            'numberposts' => 3,
            'meta_query' => array(
                array(
                    'key' => 'топ_продаж',
                    'value' => 'yes',
                )
            ),
        ]);
        foreach($posts as $post): setup_postdata($post);?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="top_sales_item">
                    <div class="top_sales_face">
                        <img src="/wp-content/themes/finservice/img/temaprime.png" alt="">
                        <p class="top_sales_name"><?the_title();?></p>
                        <p class="top_sales_description"><?the_excerpt();?></p>
                    </div>
                    <div class="top_sales_area">
                        <p class="top_sales_area_head">Область применения TEMAPRIME</p>
                        <?if(get_field('area_use')): the_field('area_use');endif;?>
                        <a href="<? the_permalink(); ?>" class="more">Подробнее > </a>
                    </div>
                </div>
            </div>
        <?endforeach;?>
        </div>
    </section>
    <section class="advantages" style="background: url(/wp-content/themes/finservice/img/advantages.png) no-repeat center">
        <div class="container-big">
            <div class="row">
                <div class="col-xs-12 advandages_desc">
                    <h2>ПРЕИМУЩЕСТВА РАБОТЫ С НАМИ</h2>
                    <p>Компания ФИНСЕРВИС известна на рынке лакокрасочной продукции Уральского региона, Приуралья и Зауралья как надежный поставщик высокотехнологичных качественных материалов промышленного назначения для защиты от коррозии, старения и износа.</p>
                </div>
            </div>
            <div class="row">
                <div class="advantages_item col-md-3 col-sm-6 col-xs-12">
                    <span class="icon icon-1"></span>
                    <p class="advantages_item_head">Надежность</p>
                    <p class="advantages_item_desc">Многолетний опыт сотрудничества ФИНСЕРВИС и Temaspeed Tikkurila позволил оптимизировать бизнес-процесс и осуществлять своевременные и бесперебойные поставки лакокрасочных материалов, высокое качество которых подтверждено европейскими и российскими сертификатами (ISO 9001, ISO 14001).</p>
                </div>
                <div class="advantages_item col-md-3 col-sm-6 col-xs-12">
                    <span class="icon icon-2"></span>
                    <p class="advantages_item_head">Оперативность</p>
                    <p class="advantages_item_desc">ФИНСЕРВИС осуществляет оперативные поставки в регионе в течение 1-5 суток благодаря наличию теплого склада в городе Екатеринбурге с неснижаемым товарным запасом свыше 100 000 литров, трех колеровочных дозаторов, позволяющих колеровать лакокрасочные материалы по требованию заказчика.</p>
                </div>
                <div class="advantages_item col-md-3 col-sm-6 col-xs-12">
                    <span class="icon icon-3"></span>
                    <p class="advantages_item_head individual">Индивидуальный<br /> подход</p>
                    <p class="advantages_item_desc">Наличие на складе ФИНСЕРВИС полного ассортимента лакокрасочных материалов Tikkurila «Промышленные покрытия» позволяет подобрать с учетом потребностей заказчика эффективное решение защиты от коррозии и старения при неизменном сочетании высокого качества и долговечности защитных покрытий.</p>
                </div>
                <div class="advantages_item col-md-3 col-sm-6 col-xs-12">
                    <span class="icon icon-4"></span>
                    <p class="advantages_item_head">Поддержка</p>
                    <p class="advantages_item_desc">Специалисты ФИНСЕРВИС снабжают потребителей технической информацией и актуальными сертификатами, помогают в выборе системы окраски, участвуют при подборе цвета и колеровки краски, рассчитывают количество, помогают освоить технологии безопасного использования краски. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom_nav">
        <div class="container">
            <ul class="row">
                <li class="bottom_nav_item col-md-4 col-sm-6 col-xs-12"><a href="/calendar/" class="calendar"><span>Календарь</span></a></li>
                <li class="bottom_nav_item col-md-4 col-sm-6 col-xs-12"><a href="/art/" class="art"><span>Искусство</span></a></li>
                <li class="bottom_nav_item col-md-4 col-sm-6 col-xs-12"><a href="/tech/" class="technology"><span>Технологии</span></a></li>
            </ul>
        </div>
    </section>
<? get_footer();
