<?php

/**
 * Template Name: Team
 *
 * The template for the team page
 * @url: www.outbrain.com/about/team
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container about team" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1>
                        Meet our leaders
                    </h1>
                    <p>
                        The people behind the scenes.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row our-executives navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Our Executives</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
            </div>
        </div>
    </div>
    <div class="row people">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="section">
                    <ul>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/yaron-galai.jpg" />
                            <div class="information">
                                <div class="name">Yaron Galai</div>
                                <div class="title">Co-Founder & CEO</div>
                                <div class="biography">
                                    Yaron Galai is Co-Founder and Chief Executive Officer at Outbrain. Prior to founding Outbrain, Mr. Galai was Co-Founder, SVP of Quigo, Inc., a provider of performance-based marketing solutions for advertisers and premium publishers. He previously served as the CEO of the company for three years. Quigo was acquired by AOL in December 2007. Previously, Mr. Galai was Co-Founder & VP Business Development at Ad4ever, a developer of rich-media advertising technologies for the web which was later acquired by Atlas (a division of aQuantive). Earlier, he was the Founder of NetWorks Web Design - an SEO and web design firm. At NetWorks he oversaw the production and search engine optimization of over 30 websites. Mr. Galai studied industrial design at the Holon Technological Institute, and is a Major (reserve) officer in the Israel Navy.
                                </div>
                                <div class="social">
                                    <a href="http://twitter.com/yarongalai" target="_blank">@yarongalai</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/tom-foran.jpg" />
                            <div class="information">
                                <div class="name">Tom Foran</div>
                                <div class="title">Chief Revenue Officer</div>
                                <div class="biography">
                                    Tom Foran is Chief Revenue Officer at Outbrain. As CRO, Tom leads all Sales, Business Operations and Client Services globally. Prior to joining Outbrain, Tom was the CRO of Crisp Media, a leading mobile rich media company. As GM of Ad Sales & Operations for Quigo, Tom was instrumental in driving the company's rapid growth (Quigo was acquired by AOL for $340 million in 2007). Tom also worked in business development at NBCi and Yahoo!. Tom graduated summa cum laude/Phi Beta Kappa from Tufts University and resides in New York City with his wife and 2 daughters.
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/elise-garofalo.jpg" />
                            <div class="information">
                                <div class="name">Elise Garofalo</div>
                                <div class="title">Chief Financial Officer</div>
                                <div class="biography">
                                    Elise has served as our Chief Financial Officer since April 2014. From February 2010 to April 2014, she served as the Senior Vice President, Treasurer and Investor Relations at Revlon, Inc. Prior to that, Elise was the Chief Financial Officer of Marakon Associates, Inc. Elise holds a BS in Accounting from The University of Connecticut’s School of Business and an MBA from Vanderbilt University.
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/ziv-kop.jpg" />
                            <div class="information">
                                <div class="name">Ziv Kop</div>
                                <div class="title">Chief Operating Officer</div>
                                <div class="biography">
                                    Ziv is Outbrain’s Chief Operating Officer and was a founding member of our Board of Directors. His experience spans over 15 years, during which he has served on the board of more than 10 private and public companies. A Managing Partner at GlenRock Israel from its inception in 2003, Ziv led a portfolio of some 15 companies, including Quigo, Mobileye, Kamada (Nasdaq: KMDA), Evogene (NYSE: EVGN), Outbrain and Rainbow Medical. Prior to Glenrock, Ziv was the CEO of POC Management Consulting, a leading Israeli management-consulting firm, where he was involved in more than 100 cross-industry management-consulting projects for market-leading clientele. Ziv served for six years in the Israeli Navy as a captain and as a fleet commander and in 2009 was listed on the "40 under 40" by The Marker.
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/ori-lahav.jpg" />
                            <div class="information">
                                <div class="name">Ori Lahav</div>
                                <div class="title">Co-founder, GM, Israel</div>
                                <div class="biography">
                                    Ori Lahav is Co-Founder and General Manager, Israel at Outbrain. Ori oversees the company's R&D center located in Israel. Ori's duties include overseeing all technical aspects of the company including algorithmic design and product innovation. Prior to co-founding Outbrain, Ori led the R&D groups in search and classification at Shopping.com, which was acquired by eBay for $634 million. Ori also previously led the video streaming Server Group at financial technology company Vsoft. A practical engineer from the Rupin Academic Institute Ori is also a Major (reserve) officer in the Israeli Navy.
                                </div>
                                <div class="social">
                                    <a href="http://twitter.com/orilahav/" target="_blank">@orilahav</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/itai-hochman.jpg" />
                            <div class="information">
                                <div class="name">Itai Hochman</div>
                                <div class="title">SVP, Engineering</div>
                                <div class="biography">
                                    Itai Hochman is Senior Vice President of Engineering at Outbrain. Prior to joining Outbrain, Itai served as Director of R&D at Schema Ltd. a provider of advanced network optimization solutions and professional services for telecom operators. Itai also held various management roles at Bandwiz, an information asset delivery company, and banking and payment solutions company VSoft. Itai holds a B.S. in Mechanical Engineering and an MBA from the Technion-Israel Institute of Technology. He resides in Israel.
                                </div>
                                <div class="social">
                                    <a href="http://twitter.com/itaihochman/" target="_blank">@itaihochman</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>
    <div class="row board-of-directors">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Our Board of Directors</h2>
                <p class="description">
                    Outbrain built and operates the world's largest content discovery platform, helping people to discover interesting, relevant, and trusted content wherever they are. Our technology delivers consumer insight, reaching an audience of more than 550 million people around the globe each month.
                </p>
            </div>
        </div>
    </div>
    <div class="row people">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="section">
                    <ul class="board-of-directors">
                        <li>
                            <div class="information">
                                <div class="name">Yaron Galai</div>
                                <div class="title">Co-Founder & CEO</div>
                                <div class="biography">
                                    Yaron Galai is Co-Founder and Chief Executive Officer at Outbrain. Prior to founding Outbrain, Mr. Galai was Co-Founder, SVP of Quigo, Inc., a provider of performance-based marketing solutions for advertisers and premium publishers. He previously served as the CEO of the company for three years. Quigo was acquired by AOL in December 2007. Previously, Mr. Galai was Co-Founder & VP Business Development at Ad4ever, a developer of rich-media advertising technologies for the web which was later acquired by Atlas (a division of aQuantive). Earlier, he was the Founder of NetWorks Web Design - an SEO and web design firm. At NetWorks he oversaw the production and search engine optimization of over 30 websites. Mr. Galai studied industrial design at the Holon Technological Institute, and is a Major (reserve) officer in the Israel Navy.
                                </div>
                                <div class="social">
                                    <a href="javascript:void(0)">@yarongalai</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Yaron Galai</div>
                                <div class="title">Co-Founder & CEO</div>
                                <div class="biography">
                                    Yaron Galai is Co-Founder and Chief Executive Officer at Outbrain. Prior to founding Outbrain, Mr. Galai was Co-Founder, SVP of Quigo, Inc., a provider of performance-based marketing solutions for advertisers and premium publishers. He previously served as the CEO of the company for three years. Quigo was acquired by AOL in December 2007. Previously, Mr. Galai was Co-Founder & VP Business Development at Ad4ever, a developer of rich-media advertising technologies for the web which was later acquired by Atlas (a division of aQuantive). Earlier, he was the Founder of NetWorks Web Design - an SEO and web design firm. At NetWorks he oversaw the production and search engine optimization of over 30 websites. Mr. Galai studied industrial design at the Holon Technological Institute, and is a Major (reserve) officer in the Israel Navy.
                                </div>
                                <div class="social">
                                    <a href="javascript:void(0)">@yarongalai</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Yaron Galai</div>
                                <div class="title">Co-Founder & CEO</div>
                                <div class="biography">
                                    Yaron Galai is Co-Founder and Chief Executive Officer at Outbrain. Prior to founding Outbrain, Mr. Galai was Co-Founder, SVP of Quigo, Inc., a provider of performance-based marketing solutions for advertisers and premium publishers. He previously served as the CEO of the company for three years. Quigo was acquired by AOL in December 2007. Previously, Mr. Galai was Co-Founder & VP Business Development at Ad4ever, a developer of rich-media advertising technologies for the web which was later acquired by Atlas (a division of aQuantive). Earlier, he was the Founder of NetWorks Web Design - an SEO and web design firm. At NetWorks he oversaw the production and search engine optimization of over 30 websites. Mr. Galai studied industrial design at the Holon Technological Institute, and is a Major (reserve) officer in the Israel Navy.
                                </div>
                                <div class="social">
                                    <a href="javascript:void(0)">@yarongalai</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer();