<?php
    //
    // vnStat PHP frontend (c)2006-2010 Bjorge Dijkstra (bjd@jooz.net)
    //
    // This program is free software; you can redistribute it and/or modify
    // it under the terms of the GNU General Public License as published by
    // the Free Software Foundation; either version 2 of the License, or
    // (at your option) any later version.
    //
    // This program is distributed in the hope that it will be useful,
    // but WITHOUT ANY WARRANTY; without even the implied warranty of
    // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    // GNU General Public License for more details.
    //
    // You should have received a copy of the GNU General Public License
    // along with this program; if not, write to the Free Software
    // Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
    //
    //
    // see file COPYING or at http://www.gnu.org/licenses/gpl.html
    // for more information.
    //
    error_reporting(E_ALL | E_NOTICE);

    //
    // configuration parameters
    //
     $language = isset($_GET['lang']) ? $_GET['lang'] : '';

      switch($language){
         case 'fr':
             $locale = 'fr_FR';
         break;
         case 'en':
             $locale = 'en_UK';
         break;

         default:
            // edit these to reflect your particular situation
            //

            $language = 'fr';
            $locale = 'fr_FR';
         break;
      }

    // Set local timezone
    date_default_timezone_set("America/Montreal");

    // list of network interfaces monitored by vnStat
    $iface_list = array('enp0s31f6', 'tun0' , 'tun1');

    //
    // optional names for interfaces
    // if there's no name set for an interface then the interface identifier
    // will be displayed instead
    //
    $iface_title['INTERFACE'] = 'Reseau';
    $iface_title['tun0'] = 'VPN 1';
    $iface_title['tun1'] = 'VPN 2';
    $iface_title['tun2'] = 'VPN 3';
    $iface_title['tun3'] = 'VPN 4';
    //
    // There are two possible sources for vnstat data. If the $vnstat_bin
    // variable is set then vnstat is called directly from the PHP script
    // to get the interface data.
    //
    // The other option is to periodically dump the vnstat interface data to
    // a file (e.g. by a cronjob). In that case the $vnstat_bin variable
    // must be cleared and set $data_dir to the location where the dumps
    // are stored. Dumps must be named 'vnstat_dump_$iface'.
    //
    // You can generate vnstat dumps with the command:
    //   vnstat --json -i $iface > /path/to/data_dir/vnstat_dump_$iface
    //
    $vnstat_bin = '/usr/bin/vnstat';
    $data_dir = './dumps';

    // graphics format to use: svg or png
    $graph_format='svg';

    // preferred byte notation. null auto chooses. otherwise use one of
    // 'TB','GB','MB','KB'
    $byte_notation = null;

    // Font to use for PNG graphs
    define('GRAPH_FONT',dirname(__FILE__).'/VeraBd.ttf');

    // Font to use for SVG graphs
    define('SVG_FONT', 'Verdana');

    // Default theme
    define('DEFAULT_COLORSCHEME', 'blue');
    
    // SVG Depth scaling factor
    define('SVG_DEPTH_SCALING', 1);

?>
