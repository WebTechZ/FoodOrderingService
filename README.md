# ชื่อกลุ่ม soloWork

# ชื่อระบบ Food Ordering Service

# ชื่อสมาชิกในกลุ่ม
นายธนกฤต ญาณนาม 6110400653 Panggundam00


# Feature
- เป็นระบบช่วยในการจัดการภายในร้านอาหาร
- ถูกทำมาเพื่อ Support Java App
- Owner สามารถดูโต๊ะในขณะปัจจุบันได้ สามารถแก้ไขรายการอาหารได้ สามารถดูรายการอาหารที่ลูกค้าสั่งได้
- database จะถูกทำเป็น api ให้ Java App เรียกใช้งาน
- api จะถูกเรียกโดย Java App


# วิธีการติดตั้งโปรเจคสำหรับการพัฒนา
- clone repo นี้
- รันคำสั่งตามนี้ 
    - composer install
    - npm install
    - cp .env.example .env
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed

# เงื่อนไขสำหรับผู้พัฒนาและผู้ติดตั้งระบบที่ต้องทราบ
- database ชื่อ FoodOrderingService มี schema ชื่อ data เป็น schema หลักของตาราง
- ตาราง tables ใช้เก็บข้อมูลโต๊ะในร้าน
- ตาราง orders ใช้เก็บข้อมูล order ที่ลูกค้าสั่ง
- ตาราง menus ใช้เก็บข้อมูล menu ทั้งหมด
- ตาราง orders_history ใช้เก็บข้อมูล order ทั้งหมดหลังจากที่ทำการ checkbill
- อธิบาย class ที่ java เรียกใช้ในไฟล์ ApiController.java
    - method getMethod ใช้ในการเรียก get api โดยใส่ parameter คือ link ของ api ที่ใช้เรียก จะ return ค่าออกมาเป็น string ใน format json
    - method postMethod ใช้ในการเรียก post api โดยใส่ parameter 2 ตัว คือ 1.link ของ api ที่จะเรียก   2.data ของ request ที่จะส่งไป โดยจะส่งไปเป็น string ที่เป็น format json
    - method putMethod ใช้ในการเรียก put/patch api โดยใส่ parameter 2 ตัว คือ 1.link ของ api ที่จะเรียก   2.data ของ request ที่จะส่งไป โดยจะส่งไปเป็น string ที่เป็น format json
    - method deleteMethod ใช้ในการเรียก delete api โดยใส่ parameter คือ link ของ api ที่จะเรียก
