# 📘 API Guide: Feature

This documentation is auto-generated for the **features** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/features` | Bearer |
| View One | `GET` | `/features/{id}` | Bearer |
| Create | `POST` | `/features` | Bearer |
| Update | `PUT` | `/features/{id}` | Bearer |
| Delete | `DELETE` | `/features/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `key` | *varchar* | Field from database |
| `lable` | *varchar* | Field from database |
| `type` | *enum* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
