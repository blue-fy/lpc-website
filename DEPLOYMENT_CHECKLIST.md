# ✅ LPC Website — Railway Deployment Checklist

**Status:** READY FOR DEPLOYMENT ✓

**Last verified:** 2026-06-07  
**Build:** WordPress 6.7 + PHP 8.2 + Apache  
**Database:** MySQL 8.0+ (via Railway plugin)

---

## 📋 Pre-Deployment Configuration

### ✅ COMPLETED (No action needed)
- [x] Dockerfile — properly configured with WordPress 6.7
- [x] railway.toml — build and deployment settings configured
- [x] entrypoint.sh — auto-setup script complete and tested
- [x] wp-config-railway.php — reads all env vars correctly
- [x] .htaccess — WordPress permalinks and security headers
- [x] Theme — all 8 template files present and valid
- [x] Theme assets — JS, CSS, images all present
- [x] Custom post types — Sermon, Branch, Pastor, Ministry
- [x] Navigation system — primary, footer, and social menus
- [x] Accessibility — WCAG AA compliant, proper escaping throughout
- [x] Mobile responsive — fully responsive design included
- [x] Security — nonces, sanitization, output escaping verified

---

## ⚙️ REQUIRED: Environment Variables to Set in Railway

Go to your Railway project → **WordPress service** → **Variables** tab and add these:

### Authentication & Security (⚠️ CRITICAL)

| Variable | Value | Generate From |
|----------|-------|----------------|
| `AUTH_KEY` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `SECURE_AUTH_KEY` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `LOGGED_IN_KEY` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `LOGGED_IN_SALT` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `NONCE_KEY` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `NONCE_SALT` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `AUTH_SALT` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |
| `SECURE_AUTH_SALT` | Generate 64 random chars | https://api.wordpress.org/secret-key/1.1/salt/ |

### Admin Account

| Variable | Value | Example |
|----------|-------|---------|
| `WP_ADMIN_PASSWORD` | **Strong password** | `Tr0p!cal-Church#2026` |
| `WP_ADMIN_EMAIL` | Your email | `admin@londonpentecostalchurch.org` |

### Optional (Already Set in railway.toml)

| Variable | Value | Notes |
|----------|-------|-------|
| `WP_SITE_TITLE` | `London Pentecostal Church` | Already configured |
| `WP_DEBUG` | `false` | Already configured |

### Automatic (Set by Railway MySQL plugin)

These are **automatically set** when you add the MySQL database:
- `MYSQL_HOST`
- `MYSQL_PORT`
- `MYSQL_DATABASE`
- `MYSQL_USER`
- `MYSQL_PASSWORD`

---

## 🚀 How to Deploy

### Option A: Via GitHub (Recommended)

1. Push this folder to GitHub:
   ```bash
   git init
   git add .
   git commit -m "Initial LPC website setup for Railway"
   git remote add origin https://github.com/YOUR-USERNAME/lpc-railway.git
   git push -u origin main
   ```

2. In Railway:
   - Click **+ Add Service → GitHub Repo**
   - Select the repo
   - Railway auto-detects the Dockerfile
   - Click **Deploy**

### Option B: Via Railway CLI

```bash
# Install Railway CLI
npm install -g @railway/cli

# Login
railway login

# Deploy
cd lpc-railway
railway up
```

---

## ✓ Deployment Process (Automatic)

When the container starts, **entrypoint.sh will automatically:**

1. **Wait for MySQL** — retries up to 30 times (60 seconds)
2. **Install WordPress** — one-time only (checks if already installed)
3. **Activate LPC theme** — sets it as active theme
4. **Create pages:**
   - Home (set as front page)
   - About
   - Ministries
   - Sermons
   - Branches
   - Contact
5. **Create menus:**
   - Primary Navigation (auto-populated with pages)
   - Footer Navigation
   - Social Links (for YouTube, Facebook, Instagram)
6. **Populate branches:**
   - Chadwell Heath (LPC)
   - Basildon (BPC)
   - Chelmsford (CPC)
   - Harlow (HPC)
   - South London (SLPC)
7. **Set theme options:**
   - Hero section text & CTAs
   - Service times
   - Contact information
   - Social media links
8. **Create sample announcement**
9. **Fix file permissions** — ensures wp-content is writable

**Expected time:** 2-5 minutes depending on MySQL initialization

---

## 📊 What You'll Get

After deployment at `your-domain.up.railway.app`:

```
Homepage (/)
├── Hero section (customizable via wp-admin)
├── Service times section
├── Recent sermons (YouTube feed or custom CPT)
├── News & announcements (from blog posts)
├── Why LPC values section
└── Branch locations grid

About (/about)
├── Story section with custom content
├── Statistics card grid
└── Values/team section (editable)

Ministries (/ministries)
├── Ministry archive grid
└── Individual ministry pages

Sermons (/sermons)
├── Sermon archive
└── Sermon single page (with YouTube embed)

Branches (/branches)
├── Branch archive
└── Individual branch details

Contact (/contact)
├── Contact form (native or WPForms plugin)
└── Service times & location

Admin Panel (/wp-admin)
├── All WordPress admin features
├── Theme customizer
├── Custom post types (Sermon, Branch, Pastor, Ministry)
└── Preloaded sample data
```

---

## 🔑 First Admin Login

After successful deployment:

1. Wait for green checkmark in Railway dashboard (~2-5 minutes)
2. Visit: `https://YOUR-DOMAIN.up.railway.app/wp-admin`
3. Username: `lpcadmin`
4. Password: Whatever you set in `WP_ADMIN_PASSWORD`

---

## 📝 Post-Deployment Setup (5 min)

### 1. Upload Site Logo

1. Go **Appearance → Customise → Site Identity**
2. Upload `lpc-theme/images/LPC_transparent.png`
3. Publish

### 2. Configure Branch Logos

1. Go **Branches** in left menu
2. Edit each branch
3. Paste logo URL from your Media Library (upload first)

### 3. Update Service Times & Contact Info

1. **Appearance → Customise → LPC Theme Options**
2. Update:
   - English Service time
   - Malayalam Service time
   - Hindi Service time
   - Bible Study time
   - Address
   - Email
   - Phone (optional)
   - YouTube channel URL
   - Facebook URL (optional)
   - Instagram URL (optional)

### 4. Connect YouTube Sermon Feed (Optional)

1. **Plugins → Add New** → search "Feeds for YouTube"
2. Install by Smash Balloon
3. **YouTube Feed → Add New**
4. Connect your YouTube channel
5. Configure to show 3 latest videos

### 5. Add More Content

- **Posts** → Add announcements/news
- **Sermons** → Add sermon recordings
- **Pages** → Edit existing pages with custom content
- **Pastors** → Add staff bios

---

## 🔒 Security Notes

✅ **Already Configured:**
- HTTPS/SSL (Railway handles at proxy)
- Security headers (.htaccess)
- WordPress security keys (from environment)
- Input sanitization (all forms)
- Output escaping (all templates)
- Nonce verification (admin/forms)
- XML-RPC disabled (.htaccess)
- wp-config.php protected (.htaccess)

⚠️ **Post-Deployment Security:**
- [ ] Change default admin password frequently
- [ ] Delete unused default posts/pages
- [ ] Keep WordPress + plugins updated
- [ ] Install security plugin (Wordfence, iThemes, etc.)
- [ ] Set up regular backups
- [ ] Monitor site health via WordPress.org

---

## 📦 Free Tier Limitations (Railway)

| Resource | Free Tier | Notes |
|----------|-----------|-------|
| RAM | 512MB | Enough for WordPress |
| CPU | Shared | Fine for low traffic |
| Bandwidth | 100GB/month | Plenty for a church site |
| Uptime | Sleeps after 7 days inactivity | Upgrade to Hobby plan ($5/mo) for 24/7 |

**Recommendation:** For permanent preview/production, upgrade to **Railway Hobby Plan ($5/month)** — never sleeps.

---

## 🚨 Troubleshooting

### Container won't start
- Check logs in Railway dashboard
- Verify MySQL service is running (green)
- Ensure all env vars are set
- Check Docker build succeeded

### WordPress stuck in "installing" loop
- Check MySQL connection (try `ping MYSQL_HOST`)
- Verify credentials match MySQL plugin settings
- Check entrypoint.sh logs for errors

### Theme not activating
- SSH into container: `railway run bash`
- Check: `cd /var/www/html && wp theme list --allow-root`
- Manually activate: `wp theme activate lpc-theme --allow-root`

### Pages not appearing
- Go **Settings → Reading → Front Page**
- Set "Home" page as front page
- Check pages exist: **Pages** in left menu

### Images/CSS not loading
- Clear browser cache (Ctrl+Shift+Del)
- Check file permissions: `chmod -R 755 /var/www/html/wp-content`
- Verify theme path: `wp option get stylesheet`

---

## 📞 Support

- **Theme files:** `lpc-theme/` folder
- **Config:** `wp-config-railway.php`
- **Deploy script:** `entrypoint.sh`
- **Railway docs:** https://docs.railway.app
- **WordPress docs:** https://wordpress.org/support

---

## ✨ Key Features Included

- ✅ Fully responsive design (mobile-first)
- ✅ Accessible navigation (ARIA labels, keyboard support)
- ✅ Custom post types (Sermon, Branch, Pastor, Ministry)
- ✅ Theme customizer (hero text, service times, contact info)
- ✅ Multi-language support (English, Malayalam, Hindi)
- ✅ Beautiful hero section with animated backgrounds
- ✅ YouTube sermon integration ready
- ✅ Contact form (native + WPForms compatible)
- ✅ Branch location grid with branch-specific branding
- ✅ Social media links
- ✅ Semantic HTML (Schema.org markup)
- ✅ Performance optimizations (lazy loading, minification)
- ✅ Security hardened (CSP headers, nonce verification)

---

## 🎯 Next Steps

1. **Set environment variables** (see above)
2. **Deploy to Railway**
3. **Wait for green ✓** in dashboard
4. **Login to wp-admin**
5. **Upload logos & content**
6. **Test all pages**
7. **Share domain with team**

---

**Ready to go live?** You're all set! 🚀

© 2026 London Pentecostal Church
