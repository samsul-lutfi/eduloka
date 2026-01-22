# EduLoka LMS

## Overview
Aplikasi Learning Management System (LMS) berbasis PHP untuk manajemen pembelajaran interaktif dengan fitur lengkap.

## Stack Teknologi
- **Backend**: PHP 8.4 dengan PDO
- **Database**: PostgreSQL
- **Frontend**: Bootstrap 5, JavaScript Vanilla
- **Server**: PHP Built-in Server (port 5000)

## Login Demo
- Username: `admin` | Password: `admin` | Role: Administrator
- Username: `pengajar1` | Password: `12345*` | Role: Pengajar
- Username: `mahasiswa1` | Password: `12345*` | Role: Mahasiswa

## Struktur Menu (Updated)

### Admin:
- **Dasbor** - Dashboard utama
- **Akademik** (Dropdown)
  - Bank Soal
  - Daftar Nilai
  - Analytics
- **Kursus** (Dropdown)
  - Program Studi
  - Mata Kuliah
- **Manajemen** (Dropdown)
  - Pengguna
  - Kelola Pendaftaran
  - Manajemen Menu
  - Pengaturan
- **Laporan** (Dropdown)
  - Ketuntasan Aktivitas
  - Waktu Penggunaan
  - Export

### Pengajar:
- **Dasbor** - Dashboard utama
- **Akademik** (Dropdown)
  - Bank Soal
  - Daftar Nilai
  - Analytics
- **Kursus** (Dropdown)
  - Kursus Saya
- **Manajemen** (Dropdown)
  - Kelola Pendaftaran
- **Laporan** (Dropdown)
  - Export

### Mahasiswa:
- **Dasbor** - Dashboard utama
- **Pembelajaran** (Dropdown)
  - Kursus Saya
  - Daftar Nilai
- **Aktivitas** (Dropdown)
  - Gamifikasi
  - Sertifikat
- **Presensi** (Dropdown)
  - Presensi QR
- **Pencarian Mata Kuliah** - Browse dan cari kursus

## Struktur Folder
```
.
├── api/                    # API endpoints
├── assets/                 # Static assets (css, js, images, uploads)
├── components/            # Reusable components (header, footer)
├── config/                # Configuration files
│   ├── config.php        # Main config
│   ├── database.php      # Database connection
│   ├── lang_id.php       # Indonesian translations
│   └── lang_en.php       # English translations
├── includes/              # Helper services
├── migrations/            # Database migrations
├── modules/               # Feature modules
│   ├── admin/            # Admin features
│   ├── pengajar/         # Lecturer features
│   ├── mahasiswa/        # Student features
│   └── shared/           # Shared modules (gradebook, question_bank, export)
├── uploads/               # User uploads
├── vendor/                # Composer dependencies
├── index.php              # Dashboard
├── login.php              # Login page
└── course_view.php        # Course detail page
```

## Features

### Authentication System
- 3 Roles: Admin, Pengajar, Mahasiswa
- Session-based authentication
- Secure password hashing
- Rate limiting for login

### Content Management
- Program Studi (CRUD)
- Mata Kuliah (CRUD)
- Enrollment System with approval
- Activities: Materi, Video, Quiz, Tugas, Forum Diskusi

### Learning Features
- Quiz dengan auto-grading
- Sistem tugas dengan upload file
- Forum diskusi dengan threading
- Presensi dengan QR code
- File management
- Sistem notifikasi

### Question Bank (Bank Soal)
- **8 Jenis Soal:**
  1. Multiple Choice (Pilihan Ganda) - satu jawaban benar
  2. True/False (Benar/Salah) - pilihan biner
  3. Short Answer (Jawaban Singkat) - auto-grading dengan kata kunci
  4. Essay (Esai/Uraian) - penilaian manual dengan rubrik
  5. Matching (Menjodohkan) - pasangkan item dari dua kolom
  6. Multiple Answer (Pilihan Ganda Kompleks) - lebih dari satu jawaban benar
  7. Ordering (Penyusunan Urutan) - susun item dalam urutan benar
  8. Drag & Drop (Seret dan Lepas) - drag item ke drop zone
- **Fitur Manual:** Wizard langkah demi langkah untuk membuat soal
- **Fitur AI:** Generate soal otomatis menggunakan OpenAI GPT
  - Input topik dan konteks materi
  - Pilih jenis soal, tingkat kesulitan, dan jumlah soal
  - Preview hasil AI sebelum menyimpan
  - Bisa regenerate jika tidak sesuai

### Gamification System
- Points System: Poin otomatis untuk quiz, tugas, presensi, forum, materi, video
- Badge System: 10 jenis badge
- Leaderboard: Global dan per-kursus
- Progress Tracking: Pelacakan kemajuan kursus per mahasiswa

### Certificate System
- Sertifikat Digital: Generate otomatis setelah 80%+ progress
- Template Sertifikat: Desain profesional dengan nomor unik
- Verifikasi Online: Sistem verifikasi sertifikat dengan kode unik

### Analytics Dashboard
- Dashboard Admin: Statistik pengguna, kursus, enrollment, dan gamification
- Dashboard Pengajar: Analytics per kursus dengan progress mahasiswa

### Export/Reports
- Export to Excel (XLSX) dan PDF
- Export gradebook, attendance, users, courses, enrollments
- Time Spent Report: Laporan waktu penggunaan LMS per pengguna
- Activity Completion Report: Laporan ketuntasan aktivitas per mahasiswa per kursus

### Time Spent Tracking
- Session tracking: Mencatat durasi sesi pengguna secara otomatis
- Heartbeat mechanism: Update durasi setiap 60 detik
- Filter by date range dan role
- Export ke Excel (XLSX) dan PDF
- Statistik: Total pengguna, total waktu, total sesi

### Additional Features
- Dual Language (Indonesia & English) dengan real-time switching
- Light & Dark Theme
- Responsive Design
- AI Chatbot Assistant (powered by OpenAI - optional)

## Database Connection
Database menggunakan environment variables dari Replit:
- `DATABASE_URL`
- `PGHOST`, `PGPORT`, `PGDATABASE`, `PGUSER`, `PGPASSWORD`

## Environment Variables Required
- `DATABASE_URL` - PostgreSQL connection string (provided by Replit)
- `OPENAI_API_KEY` - OpenAI API key for AI Chatbot feature (optional)
- `SESSION_SECRET` - Session encryption key

## User Preferences
- Default language: Indonesia (id)
- Default theme: Light
- Language dapat diubah via dropdown di navbar
- Theme dapat diubah via toggle button di navbar

## Activity Tracking System
- **Materi**: Ditandai selesai secara otomatis saat dibuka
- **Video**: Ditandai selesai setelah mahasiswa mengklik tombol "Tandai Selesai Menonton"
- **Forum**: Ditandai selesai setelah mengirimkan balasan/komentar
- **Kuis/UTS/UAS**: Ditandai selesai setelah mengumpulkan jawaban
- **Tugas**: Ditandai selesai setelah mahasiswa mengumpulkan tugas (submit)

## Participation Score Calculation
Partisipasi dihitung berdasarkan persentase aktivitas yang diselesaikan:
- **Formula**: (Aktivitas Selesai / Total Aktivitas) × 100%
- **Contoh**: 7 dari 10 aktivitas selesai = 70% skor partisipasi

## Recent Changes (December 2025)
- **Menu Management System**: Admin dapat mengelola menu dinamis dan mengatur visibility per role via `/modules/admin/menu_management.php`
- **Edit File Name**: Pengajar/Admin dapat mengedit nama file lampiran pada aktivitas
- **Import Users Fix**: Perbaikan error JSON parsing saat import users dari Excel dengan output buffering
- **Users Modal Fix**: Perbaikan halaman Pengguna yang freeze setelah edit/hapus user
- **Activity Completion Report Fix**: Filter enrollment menggunakan status 'active' (bukan 'approved')
- **UNIQUE Constraint**: Menambahkan UNIQUE constraint pada tabel activity_access untuk mendukung ON CONFLICT queries
- **PDF Export dengan Tanda Tangan Dosen**: Semua export PDF (presensi, jurnal mengajar, nilai akhir) kini menyertakan informasi kursus dan tanda tangan dosen pengampu
- **Rate Limiter Update**: Login lockout setelah 3 percobaan gagal selama 3 menit (sebelumnya 5 percobaan / 15 menit)
- **Import User via Excel**: Admin dapat import user massal dari file Excel dengan password default 12345*
- **Template Import User**: Tersedia template Excel untuk import user (api/download_template.php?type=users)
- **Time Spent Report Fix**: Pengajar tidak melihat data admin pada laporan waktu penggunaan

## Previous Changes
- Updated Participation score calculation to count ALL activities (not just forum/materi/video)
- Fixed activity completion logic - only materi auto-completes on open
- Added "Tandai Selesai Menonton" button for video activities
- Fixed fullscreen exit blocking page interactions
- Added autocomplete/suggestion feature for all search inputs
- Added AI-powered question generation feature (OpenAI GPT integration)
- Enhanced Question Bank with 8 different question types
- Added wizard-based question creation interface
- Reorganized menu structure with dropdown menus per role
- Added search and filter functionality for course browsing (students)
- Fixed forum discussion post bug (500 error)
- Added export module for admin and pengajar
- Improved language translation system

## Security Features
- CSRF Protection
- Secure Session Management
- Rate Limiting for login
- Input validation
- Prepared statements for all database queries
