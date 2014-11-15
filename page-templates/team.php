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
                        Meet Our Leaders
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
                <h2 class="title">Executive Team</h2>
                <p class="description">
                    Yaron Galai and Ori Lahav founded Outbrain in 2006.  The company has since grown to over 400 employees with offices in 11 global territories.
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
                                    Elise Garofalo has been Chief Financial Officer at Outbrain. From February 2010 to April 2014, she served as the Senior Vice President, Treasurer and Investor Relations at Revlon, Inc. Prior to that, Elise was the Chief Financial Officer of Marakon Associates, Inc. Elise holds a BS in Accounting from The University of Connecticut’s School of Business and an MBA from Vanderbilt University.
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/team/executive-team/ziv-kop.jpg" />
                            <div class="information">
                                <div class="name">Ziv Kop</div>
                                <div class="title">Chief Operating Officer</div>
                                <div class="biography">
                                    Ziv Kop is Chief Operating Officer and was a founding member of our Board of Directors at Outbrain. His experience spans over 15 years, during which he has served on the board of more than 10 private and public companies. A Managing Partner at GlenRock Israel from its inception in 2003, Ziv led a portfolio of some 15 companies, including Quigo, Mobileye, Kamada (Nasdaq: KMDA), Evogene (NYSE: EVGN), Outbrain and Rainbow Medical. Prior to Glenrock, Ziv was the CEO of POC Management Consulting, a leading Israeli management-consulting firm, where he was involved in more than 100 cross-industry management-consulting projects for market-leading clientele. Ziv served for six years in the Israeli Navy as a captain and as a fleet commander and in 2009 was listed on the "40 under 40" by The Marker.
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
                <h2 class="title">Board of Directors</h2>
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
                                <div class="biography">
                                    Yaron Galai co‑founded Outbrain in 2006 and has served as our Chief Executive Officer since then.  From 2000 until it was acquired by AOL Time Warner in December 2007, Mr. Galai served as Senior Vice President of Quigo Technologies, Inc., a company that he co-founded and that was a provider of performance‑based marketing solutions for advertisers and premium publishers.  Mr. Galai studied industrial design at the Holon Technological Institute in Holon, Israel.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Ziv Kop</div>
                                <div class="biography">
                                    Ziv Kop has served as a director of our company since 2006 and as our Chief Operating Officer since March 2014.  Prior to that, since its inception in 2003 until June 2013, Mr. Kop was a Managing Partner at Glenrock Israel, a private equity firm, where he managed a portfolio of growth companies in the fields of advanced technologies and healthcare, and served on the board of a number of private and public companies.  Prior to his role at Glenrock Israel, Mr. Kop served as Chief Executive Officer of POC Management Consulting, an Israeli consultancy in the field of strategic planning.  Mr. Kop also currently serves as a director of Kamada Ltd. (NASDAQ: KMDA) and Evogene (NYSE: EVGN). Mr. Kop holds an LLB and a BA in business administration, each from Tel Aviv University, and is a graduate of INSEAD’s Young Managers Program.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Jonathan (Yoni) Cheifetz</div>
                                <div class="biography">
                                    Jonathan (Yoni) Cheifetz has served as a director of our company since 2008.  Mr. Cheifetz has served as a Partner at Lightspeed Ventures since June 2006.  Mr. Cheifetz serves as a Director of BlueVine Inc., eBuzzing, EyeView Inc., Personetics Technologies Ltd., Ginger Software, Inc., Scodix Ltd. and SolarEdge Technologies Inc.  Mr. Cheifetz holds a B.Sc. in Applied Mathematics and Computer Science from the Tel Aviv University and an M.S. in Computer Science and Applied Mathematics from the Weizman Institute of Science.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Shlomo Dovrat</div>
                                <div class="biography">
                                    Shlomo Dovrat has served as a director of our company since 2009.  Mr. Dovrat has over 30 years of experience in high-tech investments.  Mr. Dovrat is a co-founder of the Viola Group and General Partner and Co-Founder of Carmel Ventures, an Israeli venture capital firm.  Mr. Dovrat currently serves as a director of ironSource, Red Bend, cVidya, eXelate and other privately held companies.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">David Kostman</div>
                                <div class="biography">
                                    David Kostman has served as a director of our company since July 2014.  Mr. Kostman has also served as the chairman of the board of NICE Systems Ltd. (Nasdaq: NICE) since February 2013, and has served as a director of NICE Systems Ltd. since 2001 (with the exception of a short period between June 2007 and July 2008). Additionally, Mr. Kostman is currently Executive Chairman of Nanoosh LLC, a chain of restaurants in New York and Berlin. Until recently he served on the board of directors of Retalix Ltd., which was a public company dual-listed on the Nasdaq and the Tel Aviv Stock Exchange, and which was acquired by NCR Corporation in February 2013. Mr. Kostman has also served on the board of directors of several other private companies in the Internet, technology and apparel sectors. From 2006 until 2008, Mr. Kostman was a Managing Director in the investment banking division of Lehman Brothers, heading the Global Internet Group. From April 2003 until July 2006, Mr. Kostman was Chief Operating Officer and then Chief Executive Officer of Delta Galil USA, a subsidiary of publicly traded Delta Galil Industries Ltd.  From 2000 until 2002, Mr. Kostman was initially President of the International Division and then Chief Operating Officer of publicly traded VerticalNet Inc. Mr. Kostman holds a Bachelor’s degree in Law from Tel Aviv University and a Master’s degree in Business Administration from INSEAD.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Yossi Sela</div>
                                <div class="biography">
                                    Yossi Sela has served as a director of our company since 2013.  Mr. Sela is the Managing Partner of Gemini Israel Funds, a leading Venture Capital fund, which invests primarily in seed and early stage Israeli technology companies.  In this capacity, Mr. Sela sits on the boards of directors of a number of Gemini portfolio companies, including JFrog Ltd., LoyalBlocks Ltd., QualiSystems Ltd. and Xjet Solar Ltd. Mr. Sela holds a B.Sc. in Electrical Engineering from the Technion—Israel Institute of Technology and an MBA from Tel Aviv University in Israel.
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="information">
                                <div class="name">Dominique Vidal</div>
                                <div class="biography">
                                    Dominique Vidal has served as a director of our company since 2011.  Since September 2007, Mr. Vidal has served as a Partner of Index Venture Management LLP (formerly of Index Venture Management Limited), a venture capital advisory firm which provides advice to the Index Ventures fund, and serves on the board of directors of several companies in the technology sector. Prior to joining Index Venture Management LLP, Mr. Vidal was the Managing Director of Yahoo! Europe from 2004 to 2007. Mr. Vidal received an Engineering degree from École Supérieure d’Électricité (Supélec).  Mr. Vidal serves on the board of directors of Criteo S.A., a company specializing in digital performance advertising.  Mr. Vidal holds a BS in Engineering from École supérieure d’électricité, or Supelec, in Gif‑Sur‑Yvette, France.
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