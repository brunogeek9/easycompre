<div id="prod">
<!-- Inicia aqui menu vertical! feito por Hanna-->
				<style>
.ddsmoothmenu-v ul {
    margin: 0;
    padding: 0;
    width: 170px;
 /* Largura menu principal */
    list-style-type: none;
    font: bold 15px Verdana;
    border-bottom: 0px solid #ccc;
}

.ddsmoothmenu-v ul li {
    position: relative;
}

.downarrowclass {
    position: absolute;
    top: 12px;
    right: 7px;
}
.rightarrowclass {
    position: absolute;
    top: 10px;
    right: 5px;
}
    /* Top level menu links style */
.ddsmoothmenu-v ul li a {
    display: block;
    overflow: auto;
        /*force hasLayout in IE7 */
    height: 32px;
    color: #383838;
    text-decoration: none;
    padding: 5px 5px 5px 25px;
    border-bottom: 0px solid #778;
    border-right: 0px solid #778;
}

.ddsmoothmenu-v ul li a:link, .ddsmoothmenu-v ul li a:visited, .ddsmoothmenu-v ul li a:active 
{
    color: #383838;
    background-image: url(http://3.bp.blogspot.com/-VCtcZunZJ2U/T9W7MM1uIXI/AAAAAAAAB9o/yVJ0Cad3Q0g/s1600/tab_bg.gif);
    height: 22px;
    background-repeat: repeat-x;
    background-position: left center;
    margin-bottom: 1px;
    background:#e14d4d;     /* Cor menu principal*/
}

.ddsmoothmenu-v ul li a.selected {
        /*CSS class that's dynamically added to the currently active menu items' LI A element*/
    color: #383838;
    background-image: url(http://2.bp.blogspot.com/-F0-PrDUYlX4/T9W7MrjME5I/AAAAAAAAB9w/0CLQurrHUjM/s1600/tabhover_bg.gif);
    height: 22px;
    background-repeat: repeat-x;
    background-position: left center;
    background:#e14d4d;       /* Altere a cor*/
}

.ddsmoothmenu-v ul li a:hover {
    color: #383838;
    background-image: url(http://2.bp.blogspot.com/-F0-PrDUYlX4/T9W7MrjME5I/AAAAAAAAB9w/0CLQurrHUjM/s1600/tabhover_bg.gif);
    height: 22px;
    background-repeat: repeat-x;
    background-position: left center;
    background:#FFABAB;       /* Cor do hover*/
}
    /*Largura submenu */
.ddsmoothmenu-v ul li ul {
    position: absolute;
    width: 220px;
        /*Sub Menu Items width */
    height: 25px;
    top: 0;
    font-weight: normal;
    visibility: hidden;
}
    /* Holly Hack for IE \*/
* html .ddsmoothmenu-v ul li {
    float: left;
    height: 1%;
}

* html .ddsmoothmenu-v ul li a {
    height: 1%;
}
#smoothmenu2 {
	float: left;
	padding-top: 50px;
}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="https://sites.google.com/site/seututorial/seututorial/smoothmenu.js"></script>
<script type="text/javascript">
    })
</script>
<script type="text/javascript">
    ddsmoothmenu.init({

        mainmenuid: "smoothmenu2",
        //Menu DIV id
        orientation: 'v',
        //Horizontal ou vertical menu: "h" ou "v"
        classname: 'ddsmoothmenu-v',
        //class added to menu's outer DIV

        //customtheme: ["#804000", "#482400"],
        contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    })
</script>
<br style="clear: left" />
<div id="smoothmenu2" class="ddsmoothmenu-v">
     <ul>
      
        <li>
            <a href="link-marcador">Áudio</a>
            <ul>
                <li>
                    <a href="link-marcador">Fones de Ouvido</a>
                </li>
                <li>
                    <a href="link-marcador">Microfones</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Brinquedos</a>
            <ul>
                <li>
                    <a href="link-marcador">Bonecas</a>
                </li>
                <li>
                    <a href="link-marcador">Bonecos</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Filmes</a>
            <ul>
                <li>
                    <a href="link-marcador">Romance</a>
                </li>
                <li>
                    <a href="link-marcador">Terror</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Informática</a>
            <ul>
                <li>
                    <a href="link-marcador">Notebooks</a>
                </li>
                <li>
                    <a href="link-marcador">Tablets</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Livros</a>
            <ul>
                <li>
                    <a href="link-marcador">Literatura Estrangeira</a>
                </li>
                <li>
                    <a href="link-marcador">Literatura Nacional</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Música</a>
            <ul>
                <li>
                    <a href="link-marcador">Pop</a>
                </li>
                <li>
                    <a href="link-marcador">Rock</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="link-marcador">Papelaria</a>
            <ul>
                <li>
                    <a href="link-marcador">Apontadores</a>
                </li>
                <li>
                    <a href="link-marcador">Cadernos</a>
                </li>
            </ul>
        </li>
        <li>
                   </li>
    </ul>
    <br style="clear: left" />
</div> 
<!--termina aqui menu vertical-->