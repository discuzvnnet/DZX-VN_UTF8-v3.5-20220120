<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_ucenter_default.php 11023 2010-05-20 02:23:09Z monkey $
 */

// ============================================================================
define('UC_CONNECT', 'mysql');				// Cách kết nối với UCenter: mysql/NULL, mặc định là fscoketopen() khi nó trống, mysql là database kết nối trực tiếp, để hiệu quả thì nên dùng mysql
define('UC_STANDALONE', 1);
// Cơ sở dữ liệu liên quan (khi mysql được kết nối)
define('UC_DBHOST', 'localhost');			// Máy chủ cơ sở dữ liệu UCenter
define('UC_DBUSER', 'root');				// Tên người dùng cơ sở dữ liệu UCenter
define('UC_DBPW', 'root');				// Mật khẩu cơ sở dữ liệu UCenter
define('UC_DBNAME', 'ucenter');				// Tên cơ sở dữ liệu UCenter
define('UC_DBCHARSET', 'utf8mb4');				// Bộ ký tự cơ sở dữ liệu UCenter
define('UC_DBTABLEPRE', '`ucenter`.uc_');		// Tiền tố bảng cơ sở dữ liệu UCenter
define('UC_DBCONNECT', '0');				// Kết nối liên tục cơ sở dữ liệu UCenter 0 = đóng, 1 = mở
// Liên quan đến hình đại diện
define('UC_AVTURL', '');
define('UC_AVTPATH', '');

// Giao tiếp liên quan
define('UC_KEY', 'yeN3g9EbNfiaYfodV63dI1j8Fbk5HaL7W4yaW4y7u2j4Mf45mfg2v899g451k576');	// Khóa giao tiếp với UCenter phải nhất quán với UCenter
define('UC_API', 'http://localhost/ucenter/branches/1.5.0/server'); // Địa chỉ URL của UCenter, dựa vào hằng số này khi gọi hình đại diện
define('UC_CHARSET', 'utf-8');				// Bộ ký tự UCenter
define('UC_IP', '127.0.0.1');				// IP của UCenter, khi UC_CONNECT không phải là chế độ mysql và máy chủ ứng dụng hiện tại gặp sự cố khi phân giải tên miền, vui lòng đặt giá trị này
define('UC_APPID', '1');				// ID của ứng dụng hiện tại

// ============================================================================

define('UC_PPP', '20');

?>