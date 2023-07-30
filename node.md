# Dự án blog bán bật lửa zippo 

## Dành cho người dùng 
- Hiển thị danh sách bật lửa 
- Hiển thị thông tin chi tiết bật lửa 
- Đăng kí/ đăng nhập
- Trang tài khoản: thông tin cá nhân, đơn hàng của mình,...
- Mua bật lửa 
- Giỏ hàng

## Dành cho quản trị 
- Quản lí danh mục 
- Quản lí đơn hàng 
- Quản lí người dùng 
- Quản lí nhân viên  
- Tính lương nhân viên
- Quản lí danh mục nhà cung cấp 
- Báo cáo, thống kê
- Phân quyền nhân viên  

1. hagtags => từ khóa liên quan
- id => int
- name_hagtag => text
ex : #90th, #batluakhac, # 12congiap

2. categories => danh mục sản phẩm
- id ( mã số ) => int
- name_category => text
- image => text
- deleted_at => timestamp
ex : Zippo Classics - Phổ Thông, Bật Lửa Zippo 12 Con Giáp, Bật Lửa Zippo Replica

3. products => sản phẩm
- id => int
- image => text
- name => text 
- slug => text 
- description => text
- category_id => text
- quantity => bigInteger
- price => float
- discount => float 
- selled => int 
- status => tinyint
- created_at => timestamp
- updated_at => timestamp
- deleted_at => timestamp

4. customers => khách hàng
- id => bigint unsigned
- image  => varchar(255)
- name => varchar(255)
- day_of_birth  => date
- gender  => string
- address => varchar(255)
- email => varchar(255)
- phone => varchar(255)
- password => varchar(255)
- created_at => timestamp
- updated_at => timestamp

5. orders => hóa đơn
- id => bigint unsigned
- customer_id => bigint unsigned
- note => text 
- total => bigint 
- date_ship => date
- created_at => timestamp
- updated_id => timestamp

6. ordersdetail => chi tiết đơn hàng 
- id => bigint unsigned
- order_id => bigint unsigned
- product_id => bigint unsigned
- quantity => int 
- total => bigint
- created_at => timestamp
- updated_at => timestamp

7. users => nhân viên
- id => bigint unsigned
- name => varchar(255)
- email => varchar(255)
- gender => tinyInt
- group_id => tinyInt
- day_of_birth => date
- address => text
- phone => varchar(255)
- password => varchar(255)
- created_at => timestamp

8. groups => chức vụ 
- id => bigint unsigned
- name => varchar(255)
- created_at =>timestamp
- updated_at => timestamp

9.roles => quyền hạn 
- id => biging unsigned
- name => varchar(255)
- group_name => varchar(255)
- created_at => timestamp
- updated_at => timestamp

10. group_roles => quyền hạn chức vụ
- id => bigint unsigned
- group_id => bigint unsigned
- role_id => bigint unsigned

