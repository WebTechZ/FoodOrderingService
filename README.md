# ชื่อกลุ่ม soloWork

# ชื่อระบบ Food Ordering Service

# ชื่อสมาชิกในกลุ่ม
นายธนกฤต ญาณนาม 6110400653 Panggundam00


# Feature
- เป็นระบบช่วยในการจัดการภายในร้านอาหาร
- ถูกทำมาเพื่อ Support Java App
- Owner สามารถดูโต๊ะในขณะปัจจุบันได้ สามารถแก้ไขรายการอาหารได้ สามารถดูรายการอาหารที่ลูกค้าสั่งได้
- database จะถูกทำเป็น api ให้ Java App เรียกใช้งาน


# วิธีการติดตั้งโปรเจคสำหรับการพัฒนา
- clone repo นี้
- รันคำสั่งตามนี้ 
    - composer install
    - npm install
    - cp .env.example .env
    - php artisan key:generate

# เงื่อนไขสำหรับผู้พัฒนาและผู้ติดตั้งระบบที่ต้องทราบ
- database ชื่อ FoodOrderingService มี schema ชื่อ data เป็น schema หลักของตาราง
