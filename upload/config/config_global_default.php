<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 36362 2017-02-04 02:02:03Z nemohou $
 */

$_config = array();

// Kể từ phiên bản hiện tại, tệp này không hỗ trợ gọi bất kỳ biến hoặc hàm nào trong hệ thống //

// ----------------------------  CONFIG DB  ----------------------------- //
// -------------  Cài đặt liên quan đến cơ sở dữ liệu ------------------- //

/**
 * Cài đặt máy chủ chủ cơ sở dữ liệu, hỗ trợ nhiều bộ cài đặt máy chủ
 * @example
 * $_config['db']['1']['dbhost'] = 'localhost'; // Địa chỉ máy chủ
 * $_config['db']['1']['dbuser'] = 'root'; // Người dùng
 * $_config['db']['1']['dbpw'] = 'root';// Mật khẩu
 * $_config['db']['1']['dbcharset'] = 'gbk';// Bộ ký tự
 * $_config['db']['1']['pconnect'] = '0';// Có giữ kết nối không
 * $_config['db']['1']['dbname'] = 'x1';// Cơ sở dữ liệu
 * $_config['db']['1']['tablepre'] = 'pre_';// Tiền tố tên bảng
 *
 * $_config['db']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db'][1]['dbhost']  		= '127.0.0.1';
$_config['db'][1]['dbuser']  		= 'root';
$_config['db'][1]['dbpw'] 	 	= '';
$_config['db'][1]['dbcharset'] 		= 'utf8mb4';
$_config['db'][1]['pconnect'] 		= 0;
$_config['db'][1]['dbname']  		= 'ultrax';
$_config['db'][1]['tablepre'] 		= 'pre_';

/**
 * Cài đặt máy chủ phụ cơ sở dữ liệu (máy chủ phụ, chỉ đọc), hỗ trợ nhiều bộ cài đặt máy chủ, khi nhiều bộ máy chủ được thiết lập, hệ thống sẽ sử dụng ngẫu nhiên mỗi lần
 * @example
 * $_config['db']['1']['slave']['1']['dbhost'] = 'localhost';
 * $_config['db']['1']['slave']['1']['dbuser'] = 'root';
 * $_config['db']['1']['slave']['1']['dbpw'] = 'root';
 * $_config['db']['1']['slave']['1']['dbcharset'] = 'gbk';
 * $_config['db']['1']['slave']['1']['pconnect'] = '0';
 * $_config['db']['1']['slave']['1']['dbname'] = 'x1';
 * $_config['db']['1']['slave']['1']['tablepre'] = 'pre_';
 * $_config['db']['1']['slave']['1']['weight'] = '0'; //Trọng lượng: Dữ liệu càng lớn thì trọng lượng càng cao
 *
 * $_config['db']['1']['slave']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db']['1']['slave'] = array();

//Chuyển sang kích hoạt slave
$_config['db']['slave'] = false;
/**
 * Cài đặt chính sách triển khai phân tán cơ sở dữ liệu
 *
 * @example triển khai common_member cho máy chủ thứ hai và common_session cho máy chủ thứ ba, sau đó đặt thành
 * $_config['db']['map']['common_member'] = 2;
 * $_config['db']['map']['common_session'] = 3;
 *
 * Đối với các bảng không khai báo rõ ràng một máy chủ, chúng sẽ được triển khai trên máy chủ đầu tiên theo mặc định.
 *
 */
$_config['db']['map'] = array();

/**
 * Các cài đặt chung cho cơ sở dữ liệu, thường cụ thể cho từng máy chủ được triển khai
 */
$_config['db']['common'] = array();

/**
 *  Tắt bảng dữ liệu khỏi cơ sở dữ liệu, phân tách tên bảng bằng dấu phẩy
 *
 * @example common_session, common_member hai bảng này chỉ được đọc và ghi từ máy chủ chính và máy chủ phụ không được sử dụng
 * $_config['db']['common']['slave_except_table'] = 'common_session, common_member';
 *
 */
$_config['db']['common']['slave_except_table'] = '';

/*
 * Công cụ cơ sở dữ liệu, được đặt theo công cụ cơ sở dữ liệu của riêng bạn, mặc định là innodb sau 3.5 và myisam trước đó
 * Đối với người dùng đã nâng cấp từ 3.4 lên 3.5 và không chuyển đổi công cụ cơ sở dữ liệu, hãy đặt thành myisam tại đây
 */
$_config['db']['common']['engine'] = 'innodb';

/**
 * Cài đặt tối ưu hóa máy chủ bộ nhớ
 * Các cài đặt sau yêu cầu hỗ trợ tiện ích mở rộng PHP, trong đó memcache được ưu tiên hơn các cài đặt khác,
 * Khi không thể bật memcache, hai chế độ tối ưu hóa khác sẽ tự động được bật
 */

//Tiền tố biến bộ nhớ, có thể được thay đổi để tránh nhầm lẫn các tham chiếu chương trình trong cùng một máy chủ
$_config['memory']['prefix'] = 'discuz_';

/* Cài đặt Redis, yêu cầu hỗ trợ thành phần mở rộng PHP, chức năng của tham số thời gian chờ không được xác minh */
$_config['memory']['redis']['server'] = '';
$_config['memory']['redis']['port'] = 6379;
$_config['memory']['redis']['pconnect'] = 1;
$_config['memory']['redis']['timeout'] = 0;
$_config['memory']['redis']['requirepass'] = '';
$_config['memory']['redis']['db'] = 0;				//Tại đây bạn có thể điền các số từ 0 đến 15, mỗi trang sử dụng một db khác nhau
/**
 * Cấu hình này hiện đã bị hủy.
 */
// $_config['memory']['redis']['serializer'] = 1;

$_config['memory']['memcache']['server'] = '';			// Địa chỉ máy chủ memcache
$_config['memory']['memcache']['port'] = 11211;			// Cổng máy chủ memcache
$_config['memory']['memcache']['pconnect'] = 1;			// Memcache được kết nối trong một thời gian dài hay không
$_config['memory']['memcache']['timeout'] = 1;			// Kết nối máy chủ memcache đã hết thời gian chờ

$_config['memory']['memcached']['server'] = '';			// Địa chỉ máy chủ memcached
$_config['memory']['memcached']['port'] = 11211;		// Cổng máy chủ memcached


$_config['memory']['apc'] = 0;							// Bắt đầu hỗ trợ cho APC
$_config['memory']['apcu'] = 0;							// Bắt đầu hỗ trợ cho APCu
$_config['memory']['xcache'] = 0;						// Bắt đầu hỗ trợ cho xcache
$_config['memory']['eaccelerator'] = 0;					// Bắt đầu hỗ trợ cho eaccelerator
$_config['memory']['wincache'] = 0;						// Bật hỗ trợ cho wincache
$_config['memory']['yac'] = 0;     						// Bắt đầu hỗ trợ cho YAC
$_config['memory']['file']['server'] = '';				// Thư mục lưu trữ bộ đệm tệp, nếu được đặt thành data/cache/filecache
// Cài đặt liên quan đến máy chủ
$_config['server']['id']		= 1;			// Số máy chủ, khi có nhiều máy chủ web, ID được sử dụng để xác định máy chủ hiện tại

// Tải xuống tệp đính kèm liên quan
//
// Chế độ đọc tệp cục bộ; chế độ 2 là cách tiết kiệm bộ nhớ nhất, nhưng không hỗ trợ tải xuống đa luồng
// Nếu bạn cần địa chỉ URL của tệp đính kèm và phát lại tệp đính kèm phương tiện, bạn cần chọn chế độ đọc 1 hoặc 4 hỗ trợ tham số Phạm vi. Các chế độ khác sẽ gây ra phát lại video bất thường trong một số trình duyệt.
// 1=fread 2=readfile 3=fpassthru 4=fpassthru+multiple
$_config['download']['readmod'] = 2;

// Có bật chức năng X-Sendfile không (yêu cầu máy chủ hỗ trợ) 0=close 1=nginx 2=lighttpd 3=apache
$_config['download']['xsendfile']['type'] = 0;

// Khi nginx X-sendfile được bật, đường dẫn bản đồ ảo của thư mục đính kèm diễn đàn, vui lòng sử dụng /
$_config['download']['xsendfile']['dir'] = '/down/';

// Cài đặt đầu ra trang
$_config['output']['charset'] 			= 'utf-8';	// Bộ ký tự trang
$_config['output']['forceheader']		= 1;		// Buộc tập hợp ký tự trang đầu ra để tránh các ký tự bị cắt xén trong một số môi trường
$_config['output']['gzip'] 			= 0;		// Có sử dụng đầu ra nén Gzip hay không
$_config['output']['tplrefresh'] 		= 1;		// Công tắc tự động làm mới mẫu 0 = tắt, 1 = bật
$_config['output']['language'] 			= 'zh_cn';	// Ngôn ngữ trang zh_cn / zh_tw
$_config['output']['staticurl'] 		= 'static/';	// Đường dẫn tệp tĩnh của trang web, kết thúc bằng "/"
$_config['output']['ajaxvalidate']		= 0;		// Có xác minh chặt chẽ tính xác thực của các trang Ajax 0 = tắt, 1 = bật
$_config['output']['upgradeinsecure']		= 0;		// Yêu cầu trình duyệt nâng cấp liên kết nội bộ HTTP lên HTTPS trong môi trường HTTPS. Tùy chọn này ảnh hưởng đến liên kết tài nguyên miền bên ngoài và xung đột với CSP tùy chỉnh. 0 = tắt (mặc định), 1 = bật
$_config['output']['css4legacyie']		= 1;		// Tải các tệp css tương thích với các phiên bản thấp hơn của IE 0 = off, 1 = on (mặc định), tắt có thể ngăn các trình duyệt hiện đại tải dữ liệu không cần thiết, nhưng hiệu ứng hiển thị của IE6-8 sẽ bị ảnh hưởng nhiều và IE9 sẽ ít hơn bị ảnh hưởng.

// COOKIE 设置
$_config['cookie']['cookiepre'] 		= 'discuz_'; 	// Tiền tố COOKIE
$_config['cookie']['cookiedomain'] 		= ''; 		// Phạm vi cookie
$_config['cookie']['cookiepath'] 		= '/'; 		// Đường dẫn hành động cookie

// 站点安全设置
$_config['security']['authkey']			= 'asdfasfas';	// Khóa mã hóa trang web
$_config['security']['urlxssdefend']		= true;		// Bảo vệ XSS URL tự
$_config['security']['attackevasive']		= 0;		// CC Attack Defense 1|2|4|8
$_config['security']['onlyremoteaddr']		= 1;		// Phương thức nhận địa chỉ IP của người dùng 0 = tin cậy HTTP_CLIENT_IP, HTTP_X_FORWARDED_FOR (mặc định) 1 = chỉ tin cậy REMOTE_ADDR (được khuyến nghị)
								// Xem xét nguy cơ ngăn chặn các cuộc tấn công nhồi nhét thông tin xác thực IP và các chính sách hạn chế IP không hợp lệ, bạn nên đặt giá trị này thành 1. Người dùng sử dụng CDN có thể định cấu hình các tùy chọn ipgetter
								// Nhắc nhở bảo mật: Do tính độc lập của UCenter và UC_Client, bạn cần xác định các hằng số trong hai ứng dụng riêng biệt để kích hoạt chức năng

$_config['security']['useipban']			= 1;		// Bật / tắt chức năng IP, các trang web tải cao có thể giải phóng chức năng này cho Máy chủ HTTP / CDN / SLB / WAF để giảm áp lực máy chủ
$_config['security']['querysafe']['status']	= 1;		// Có bật tính năng phát hiện bảo mật SQL để tự động ngăn chặn các cuộc tấn công đưa vào SQL hay không
$_config['security']['querysafe']['dfunction']	= array('load_file','hex','substring','if','ord','char');
$_config['security']['querysafe']['daction']	= array('@','intooutfile','intodumpfile','unionselect','(select', 'unionall', 'uniondistinct');
$_config['security']['querysafe']['dnote']	= array('/*','*/','#','--','"');
$_config['security']['querysafe']['dlikehex']	= 1;
$_config['security']['querysafe']['afullnote']	= 0;

$_config['security']['creditsafe']['second'] 	= 0;		// Bật tính năng bảo mật thông tin điểm của người dùng có thể ngăn chặn việc quét điểm đồng thời và không thể gửi các hoạt động đáp ứng thời gian (số lần) / giây (giây).
$_config['security']['creditsafe']['times'] 	= 10;

$_config['security']['fsockopensafe']['port']	= array(80, 443);	//fsockopen valid ports
$_config['security']['fsockopensafe']['ipversion']	= array('ipv6', 'ipv4');	//fsockopen valid IP protocol
$_config['security']['fsockopensafe']['verifypeer']	= false;	// Whether fsockopen verifies the validity of the certificate, enabling it can improve security, but you need to solve the certificate configuration problem by yourself

$_config['security']['error']['showerror'] = '1';	//Có hiển thị chi tiết lỗi khi cơ sở dữ liệu hoặc hệ thống bất thường nghiêm trọng hay không, 0 = không hiển thị (an toàn hơn), 1 = hiển thị chi tiết (mặc định), 2 = chỉ hiển thị lỗi
$_config['security']['error']['guessplugin'] = '1';	//Có đoán các trình cắm có thể báo lỗi khi cơ sở dữ liệu hoặc hệ thống bất thường nghiêm trọng hay không, 0 = không đoán, 1 = đoán (mặc định)

$_config['admincp']['founder']			= '1';		// Người sáng lập trang: có quyền cao nhất của nền quản lý trang, mỗi trang có thể đặt 1 hoặc nhiều người sáng lập
								// Bạn có thể sử dụng uid hoặc tên người dùng; sử dụng dấu "," để phân tách nhiều người sáng lập;
$_config['admincp']['forcesecques']		= 0;		// Quản trị viên phải đặt câu hỏi bảo mật để nhập cài đặt hệ thống 0 = Không, 1 = Có [Bảo mật]
$_config['admincp']['checkip']			= 1;		// Hoạt động quản lý nền có xác minh IP của quản trị viên hay không, 1 = Có [Bảo mật], 0 = Không. Đặt thành 0 chỉ khi quản trị viên không thể đăng nhập nền.
$_config['admincp']['runquery']			= 0;		// Có cho phép các câu lệnh SQL chạy ở chế độ nền hay không 1 = Có 0 = Không [an toàn]
$_config['admincp']['dbimport']			= 1;		// Cho phép dữ liệu diễn đàn khôi phục nền 1 = Có 0 = Không [Bảo mật]

/**
 * Hệ thống mô-đun chức năng cuộc gọi từ xa
 */

// Cuộc gọi từ xa: công tắc chính 0 = tắt 1 = bật
$_config['remote']['on'] = 0;

// Cuộc gọi từ xa: tên thư mục chương trình. Vì lý do bảo mật, bạn có thể thay đổi tên thư mục. Sau khi sửa đổi, vui lòng sửa đổi thủ công thư mục thực của chương trình
$_config['remote']['dir'] = 'remote';

// Cuộc gọi từ xa: Khóa giao tiếp. Nó được sử dụng để mã hóa giao tiếp giữa máy khách và máy chủ. Độ dài không được nhỏ hơn 32 bit
//          Giá trị mặc định là md5 của $_config['security']['authkey'], bạn cũng có thể chỉ định theo cách thủ công
$_config['remote']['appkey'] = md5($_config['security']['authkey']);

// Cuộc gọi từ xa: Bắt đầu các tác vụ cron bên ngoài. Cron không còn được thực thi bên trong hệ thống và các tác vụ cron được kích hoạt bởi các chương trình bên ngoài
$_config['remote']['cron'] = 0;

// Kể từ phiên bản X3.5 và chức năng này có thể bị hủy trong các phiên bản tiếp theo
$_config['input']['compatible'] = 0;

/**
 * Phần mở rộng cơ sở dữ liệu IP
 * $_config['ipdb'] có thể được sử dụng như một tùy chọn cài đặt thư viện IP mở rộng tùy chỉnh ngoại trừ cài đặt.
 * Để mở rộng cài đặt của thư viện IP, vui lòng sử dụng định dạng:
 * 		$_config['ipdb']['tên thư viện ip mở rộng']['đặt tên mục'] = 'giá trị';
 * Ví dụ:
 * 		$_config['ipdb']['redis_ip']['server'] = '172.16.1.8';
 */
$_config['ipdb']['setting']['fullstack'] = '';	// Thư viện IP ngăn xếp đầy đủ được hệ thống sử dụng, với mức ưu tiên cao nhất
$_config['ipdb']['setting']['default'] = '';	// Thư viện IP mặc định được hệ thống sử dụng, với mức độ ưu tiên thấp nhất
$_config['ipdb']['setting']['ipv4'] = 'tiny';	// Thư viện IPv4 mặc định được hệ thống sử dụng, hãy để trống để sử dụng thư viện mặc định
$_config['ipdb']['setting']['ipv6'] = 'v6wry'; // Thư viện IPv6 mặc định được hệ thống sử dụng, hãy để trống để sử dụng thư viện mặc định

/**
 * Tiện ích mở rộng chuyển đổi IP
 * Xem xét rằng các nhà cung cấp dịch vụ CDN khác nhau cung cấp các chiến lược khác nhau để đánh giá IP nguồn CDN,
 * Nếu nó trống, hệ thống mặc định được sử dụng, nếu nó không trống, phương thức get trong source/class/ip/getter_xx.php sẽ tự động được gọi để lấy địa chỉ IP.
 * Để mở rộng cài đặt của mô hình thu nhận IP, vui lòng sử dụng định dạng:
 * 		$_config['ipgetter']['IP lấy tên phần mở rộng']['đặt tên mục'] = 'giá trị';
 * Ví dụ:
 * 		$_config['ipgetter']['onlinechk']['server'] = '100.64.10.24';
 */
$_config['ipgetter']['setting'] = '';
$_config['ipgetter']['header']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['iplist']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['iplist']['list']['0'] = '127.0.0.1';
$_config['ipgetter']['dnslist']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['dnslist']['list']['0'] = 'comsenz.com';

// Addon Setting
//$_config['addonsource'] = 'xx1';
//$_config['addon'] = array(
//    'xx1' => array(
//	'website_url' => 'http://127.0.0.1/AppCenter',
//	'download_url' => 'http://127.0.0.1/AppCenter/index.php',
//	'download_ip' => '',
//	'check_url' => 'http://127.0.0.1/AppCenter/?ac=check&file=',
//	'check_ip' => ''
//    )
//);

?>