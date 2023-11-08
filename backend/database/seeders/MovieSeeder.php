<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'movie_name' => 'Không Một Ai Biết',
            'country_id' => 5,
            'duration' => '138 phút',
            'year' => 2019,
            'desc' => '<p>Sevda là một cô gái rất xinh đẹp và năng động, mơ ước trở thành một ngôi sao. Ali có một quá khứ bí ẩn. Câu chuyện tình yêu phi thường của Ali và Sevda.</p>',
            'rating' => null,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/khong-mot-ai-biet-tnk-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/khong-mot-ai-biet-tnk-poster.jpg',
            'trailer_url' => 'https://hdbo.opstream5.com/share/e992292ea6314d710f2274e6df3ed9d0'
        ]);

        Movie::create([
            'movie_name' => 'Đằng Sau Kẻ Phản Diện',
            'country_id' => 1,
            'duration' => '60 phút',
            'year' => 2023,
            'desc' => '<p>Một luật sư chăm chỉ chọn ngẫu nhiên các tù nhân đến thăm và tìm việc làm cho mình gặp một cựu cầu thủ bóng chày, đồng thời là chỉ huy thứ hai của một tổ chức tội phạm. Liệu anh ta có thể chống lại sự cám dỗ của cái ác?</p>',
            'rating' => 8.0,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/dang-sau-ke-phan-dien-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/dang-sau-ke-phan-dien-poster.jpg',
            'trailer_url' => 'https://vie2.opstream7.com/share/7940ab47468396569a906f75ff3f20ef'
        ]);

        Movie::create([
            'movie_name' => 'Máu và Cổ Vật (Phần 2)',
            'country_id' => 4,
            'duration' => '40 phút',
            'year' => 2022,
            'desc' => "<p>Một chuyên gia về cổ vật hợp tác với một tên trộm nghệ thuật để truy bắt kẻ khủng bố tài trợ cho các cuộc tấn công của hắn bằng cách sử dụng các hiện vật bị đánh cắp.</p>",
            'rating' => null,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/mau-va-co-vat-phan-2-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/mau-va-co-vat-phan-2-poster.jpg',
            'trailer_url' => 'https://vie2.opstream7.com/share/9683cc5f89562ea48e72bb321d9f03fb'
        ]);

        Movie::create([
            'movie_name' => 'Trò Đùa Chết Người 2',
            'country_id' => 3,
            'duration' => '91 phút',
            'year' => 2008,
            'desc' => "While driving to Las Vegas for the bachelor party of her sister Melissa and her fiance Bobby, Kayla stops the car at a gas station to meet her date, Nik, a guy she met on the internet. Nik convinces her to take a secondary road under the protest of Bobby but the car breaks down. They find a house in the middle of nowhere and decide to take the car parked in the house's garage to the next city...",
            'rating' => 7.0,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/tro-dua-chet-nguoi-2-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/tro-dua-chet-nguoi-2-poster.jpg',
            'trailer_url' => 'https://hdbo.opstream5.com/share/aa22671aff2ca1aa1b261acf2368094b'
        ]);

        Movie::create([
            'movie_name' => 'Chim Bói Cá',
            'country_id' => 5,
            'duration' => '150 phút',
            'year' => 2022,
            'desc' => "<p>Halis Ağa là chủ sở hữu của một đế chế đồ trang sức lớn và là người đứng đầu gia tộc Korhan. Mặc dù con trai ông Orhan và cháu trai lớn Fuat điều hành hầu hết công việc kinh doanh, ông vẫn đưa ra những quyết định quan trọng nhất trong công ty. Cháu trai Ferit của ông, người hoàn toàn trái ngược với anh trai Fuat của mình, là một cử nhân trẻ tuổi rất vô trách nhiệm, người vừa trở về từ nước ngoài nơi ông đến học. Halis không thể chịu được nữa về sự liều lĩnh của Ferit và anh ta buộc tội con dâu góa chồng Ifakat của mình là phải tìm cho anh ta một cô gái đẹp để kết hôn.</p><p>Tin tức rằng Halis Ağa đang tìm một cô dâu cho cháu trai của mình, đến như một tia sáng từ màu xanh vào biệt thự của Kazım ở Gaziantep. Niềm hy vọng làm giàu duy nhất của Kazım là những cô con gái xinh đẹp của mình, Suna và Seyran. Sau khi Ifakat nhìn thấy Suna và quyết định cô ấy là cô gái phù hợp với Ferit, gia đình đã đến Gaziantep để yêu cầu Suna kết hôn. Nhưng trước buổi lễ, Ferit và Seyran gặp nhau mà không nhận ra rằng họ được cho là trở thành anh trai và em dâu, và Ferit đã bị cô ấy say mê.</p><p>Cuộc sống của hai chị em thay đổi mãi mãi khi Ferit quyết định kết hôn với Seyran thay vì Suna. Trong khi Kazım vui mừng vì đã có được một khối tài sản lớn thì Seyran sẽ là cô dâu mới trong một gia đình đầy rẫy những phản bội, dối trá và bí mật. Trong khi Suna sẽ bắt đầu thực hiện kế hoạch trả thù để lấy lại tương lai bị đánh cắp của mình, cuộc sống tại biệt thự sẽ còn khó khăn hơn với những xung đột quyền lực của hai anh em.</p>",
            'rating' => null,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/chim-boi-ca-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/chim-boi-ca-poster.jpg',
            'trailer_url' => 'https://vie.opstream1.com/share/1171d78d0d618b225dfa50bc2ebb2399'
        ]);

        Movie::create([
            'movie_name' => 'Đại Chiến Người Khổng Lồ (Phần Cuối)',
            'country_id' => 7,
            'duration' => '60 phút',
            'year' => 2023,
            'desc' => "<p>Trấn Hồn Nhai Phần 3 &nbsp; kể về câu chuyện Thiếu niên trấn hồng tướng Tào Diệm Binh sở hữu cơ thể Võ Thần, vì muốn tìm tung tích cha mẹ đã cùng thiếu nữ Hạ Linh và các đồng môn xâm nhập cấm địa Linh vực Lô Hoa Cổ Lâu, đồng thời triển khai giao chiến cùng tứ vương bảo vệ Phong Hoa Tuyết Nguyệt.</p>",
            'rating' => 8.7,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-poster.jpg',
            'trailer_url' => 'https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f'
        ]);

        Movie::create([
            'movie_name' => 'Tết ở làng địa ngục',
            'country_id' => 6,
            'duration' => '45 phút',
            'year' => 2023,
            'desc' => "Các hậu duệ của một băng cướp khét tiếng điều tra hàng loạt án mạng tàn bạo ở làng của họ. Liệu đây là nghiệp chướng hay &quot;tác phẩm&quot; của kẻ báo thù?",
            'rating' => 7.5,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/tet-o-lang-dia-nguc-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/tet-o-lang-dia-nguc-poster.jpg',
            'trailer_url' => 'https://hdbo.opstream5.com/share/2f87d717bf556321774d1b4975d2e1c1'
        ]);

        Movie::create([
            'movie_name' => 'OVERTAKE!',
            'country_id' => 7,
            'duration' => '24 phút',
            'year' => 2023,
            'desc' => "<p>Nhiếp ảnh gia tự do Kouya Madoka đang rơi vào tình trạng suy thoái vì một lý do nào đó.&nbsp;Khi đang thực hiện một câu chuyện tại Đường đua quốc tế Fuji, anh gặp tay đua F4 thời trung học Haruka Asahina và anh đột nhiên thấy tim mình đập loạn nhịp một lần nữa.&nbsp;Anh quyết định hỗ trợ Asahina và giúp anh biến giấc mơ của mình thành hiện thực với đội bóng nhỏ Komaki Motors.&nbsp;Vì vậy, cuộc sống của Madoka và Asahina, những người có tính cách và độ tuổi hoàn toàn khác nhau, giao thoa với nhau.</p>",
            'rating' => null,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/overtake-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/overtake-poster.jpg',
            'trailer_url' => 'https://hdbo.opstream5.com/share/a6ebf387b95966cea37aefa0b29ff33c'
        ]);

        Movie::create([
            'movie_name' => 'Thợ săn ác linh',
            'country_id' => 7,
            'duration' => '23 phút',
            'year' => 2023,
            'desc' => "Một sinh viên khép kín có năng lực tâm linh bắt tay với cô bé kỳ lạ đang tìm kiếm linh hồn bị bắt cóc của người mẹ quá cố.",
            'rating' => null,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/tho-san-ac-linh-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/tho-san-ac-linh-poster.jpg',
            'trailer_url' => 'https://1080.opstream4.com/share/4ae895de21512e5ab771ee7e3194a09b'
        ]);

        Movie::create([
            'movie_name' => 'Bánh Quy Ma Thuật',
            'country_id' => 1,
            'duration' => '35 phút',
            'year' => 2023,
            'desc' => "<p>Chỉ với một miếng cắn, chiếc bánh quy bí ẩn tự làm biến giấc mơ thành hiện thực, nhưng nó lại chiếm lĩnh ngôi trường trung học ưu tú và những hậu quả chết người đang chờ đợi.</p>",
            'rating' => 7.0,
            'thumb_url' => 'https://img.ophim9.cc/uploads/movies/high-cookie-thumb.jpg',
            'poster_url' => 'https://img.ophim9.cc/uploads/movies/high-cookie-poster.jpg',
            'trailer_url' => 'https://vie2.opstream7.com/share/28fc2782ea7ef51c1104ccf7b9bea13d'
        ]);
    }
}
