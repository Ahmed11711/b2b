# 📘 API Guide: User

This documentation is auto-generated for the **users** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/users` | Bearer |
| View One | `GET` | `/users/{id}` | Bearer |
| Create | `POST` | `/users` | Bearer |
| Update | `PUT` | `/users/{id}` | Bearer |
| Delete | `DELETE` | `/users/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `name` | *varchar* | Field from database |
| `email` | *varchar* | Field from database |
| `password` | *varchar* | Field from database |
| `phone` | *varchar* | Field from database |
| `user_name` | *varchar* | Field from database |
| `whtsapp` | *varchar* | Field from database |
| `country_code` | *varchar* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `email_verified_at` | *timestamp* | Field from database |
| `remember_token` | *text* | Field from database |
| `role` | *enum* | Field from database |
| `social_type` | *enum* | Field from database |
| `social_id` | *varchar* | Field from database |
| `city_id` | *varchar* | Field from database |
| `info` | *text* | Field from database |
| `last_login_at` | *timestamp* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
