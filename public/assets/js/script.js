const themeToggle = document.getElementById("theme-toggle");
const root = document.documentElement;

// Load saved theme
const savedTheme = localStorage.getItem("theme") || "dark";
root.setAttribute("data-theme", savedTheme);
document.cookie =
    "theme=" + savedTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;

// Toggle theme
themeToggle.addEventListener("click", () => {
    const currentTheme = root.getAttribute("data-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    root.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
    document.cookie =
        "theme=" + newTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;
});

// Sidebar Management
const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebar-toggle");
const sidebarClose = document.getElementById("sidebar-close");
const mobileOverlay = document.getElementById("mobile-overlay");

function openSidebar() {
    sidebar.classList.add("open");
    mobileOverlay.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeSidebar() {
    sidebar.classList.remove("open");
    mobileOverlay.classList.remove("active");
    document.body.style.overflow = "";
}

sidebarToggle.addEventListener("click", openSidebar);
sidebarClose.addEventListener("click", closeSidebar);
mobileOverlay.addEventListener("click", closeSidebar);

// Close sidebar on escape key
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && sidebar.classList.contains("open")) {
        closeSidebar();
    }
});

// Search Functionality
const searchInputs = document.querySelectorAll(
    '.form-input[placeholder*="Cari"]'
);

searchInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const currentPage = document.querySelector(".page-section.active");
        const tableRows = currentPage.querySelectorAll(
            ".table tbody tr:not(.no-results-message)"
        );
        const mobileCards = currentPage.querySelectorAll(".mobile-card");

        let hasVisibleRow = false;
        let hasVisibleCard = false;

        tableRows.forEach((row) => {
            const text = row.textContent.toLowerCase();
            const match = text.includes(searchTerm);
            row.style.display = match ? "" : "none";
            if (match) hasVisibleRow = true;
        });

        mobileCards.forEach((card) => {
            const text = card.textContent.toLowerCase();
            const match = text.includes(searchTerm);
            card.style.display = match ? "" : "none";
            if (match) hasVisibleCard = true;
        });

        const noResultsMessages = currentPage.querySelectorAll(
            ".no-results-message"
        );
        noResultsMessages.forEach((msg) => {
            msg.style.display =
                !hasVisibleRow && !hasVisibleCard && searchTerm !== ""
                    ? "block"
                    : "none";
        });
    });
});

// Export Functionality
function exportData(format) {
    const currentPage = document.querySelector(".page-section.active");
    const pageId = currentPage.id;
    const table = currentPage.querySelector(".table");

    if (!table) {
        alert("Tidak ada data untuk diekspor");
        return;
    }

    if (format === "csv") {
        exportToCSV(table, pageId);
    } else if (format === "pdf") {
        exportToPDF(table, pageId);
    }
}

function exportToCSV(table, filename) {
    const rows = table.querySelectorAll("tr");
    const csv = [];

    rows.forEach((row) => {
        const cols = row.querySelectorAll("th, td");
        const rowData = [];

        cols.forEach((col, index) => {
            // Skip action column
            if (index === cols.length - 1) return;

            let text = col.textContent.trim();
            // Clean up text
            text = text.replace(/\s+/g, " ");
            text = text.replace(/"/g, '""');
            rowData.push(`"${text}"`);
        });

        if (rowData.length > 0) {
            csv.push(rowData.join(","));
        }
    });

    const csvContent = csv.join("\n");
    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");

    if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute(
            "download",
            `${filename}_${new Date().toISOString().split("T")[0]}.csv`
        );
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Make exportData function globally available
window.exportData = exportData;

// Animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Observe cards and tables
document.querySelectorAll(".card, .stat-card").forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(20px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
});

// Responsive table handling
function handleResponsiveTable() {
    const tables = document.querySelectorAll(".table");

    tables.forEach((table) => {
        const headers = table.querySelectorAll("thead th");
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach((row) => {
            const cells = row.querySelectorAll("td");
            cells.forEach((cell, index) => {
                if (headers[index]) {
                    cell.setAttribute("data-label", headers[index].textContent);
                }
            });
        });
    });
}

// Initialize responsive tables
handleResponsiveTable();

// Handle window resize
let resizeTimer;
window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        if (window.innerWidth >= 1024 && sidebar.classList.contains("open")) {
            closeSidebar();
        }
    }, 250);
});

// Initialize tooltips for action buttons
const actionButtons = document.querySelectorAll(".action-btn");
actionButtons.forEach((btn) => {
    btn.addEventListener("mouseenter", (e) => {
        const title =
            e.target.getAttribute("title") ||
            e.target.closest(".action-btn").getAttribute("title");
        if (title) {
            // You can implement custom tooltip here
            console.log("Tooltip:", title);
        }
    });
});

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Auto-save form data to localStorage
const formInputs = document.querySelectorAll("input, select, textarea");
formInputs.forEach((input) => {
    // Load saved data
    const savedValue = localStorage.getItem(`form_${input.name || input.id}`);
    if (savedValue && input.type !== "password") {
        input.value = savedValue;
    }

    // Save data on change
    input.addEventListener("change", () => {
        if (input.type !== "password") {
            localStorage.setItem(`form_${input.name || input.id}`, input.value);
        }
    });
});

// Initialize page
document.addEventListener("DOMContentLoaded", () => {
    // Trigger initial animations
    setTimeout(() => {
        document.querySelectorAll(".card, .stat-card").forEach((el) => {
            observer.observe(el);
        });
    }, 100);

    // Set initial active page
});

// Keyboard shortcuts
document.addEventListener("keydown", (e) => {
    // Ctrl/Cmd + K for search
    if ((e.ctrlKey || e.metaKey) && e.key === "k") {
        e.preventDefault();
        const activeSearchInput = document.querySelector(
            '.page-section.active .form-input[placeholder*="Cari"]'
        );
        if (activeSearchInput) {
            activeSearchInput.focus();
        }
    }

    // Ctrl/Cmd + E for export
    if ((e.ctrlKey || e.metaKey) && e.key === "e") {
        e.preventDefault();
        exportData("csv");
    }
});

// Print functionality
function printPage() {
    window.print();
}

// Add print styles
const printStyles = `
            @media print {
                .sidebar, .header, .mobile-overlay, .action-buttons {
                    display: none !important;
                }
                .main-content {
                    margin-left: 0 !important;
                }
                .content {
                    padding: 1rem !important;
                }
                .card {
                    box-shadow: none !important;
                    border: 1px solid #000 !important;
                    break-inside: avoid;
                }
                .table {
                    font-size: 12px !important;
                }
            }
        `;

const styleSheet = document.createElement("style");
styleSheet.textContent = printStyles;
document.head.appendChild(styleSheet);

function showNotification(type, title, message) {
    const container = document.getElementById("notification-container");
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;

    const iconMap = {
        success: "fas fa-check-circle",
        error: "fas fa-exclamation-circle",
        warning: "fas fa-exclamation-triangle",
        info: "fas fa-info-circle",
    };

    notification.innerHTML = `
                <i class="notification-icon ${iconMap[type]}"></i>
                <div class="notification-content">
                    <div class="notification-title">${title}</div>
                    <div class="notification-message">${message}</div>
                </div>
                <button class="notification-close" onclick="removeNotification(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;

    container.appendChild(notification);

    // Show notification
    setTimeout(() => {
        notification.classList.add("show");
    }, 300);

    // Auto remove after 5 seconds
    setTimeout(() => {
        removeNotification(notification.querySelector(".notification-close"));
    }, 4000);
}

function removeNotification(button) {
    const notification = button.closest(".notification");
    notification.classList.remove("show");

    setTimeout(() => {
        notification.remove();
    }, 300);
}
function openModal(modalId, id = null, mode = null) {
    const modal = document.getElementById(modalId);
    if (modal) {
        const form = modal.querySelector("form");
        if (form && (!id || mode !== "Edit")) {
            form.reset();
        }

        // Kalau bukan dari session (bukan reload akibat validasi), bersihkan error
        if (id && mode) {
            const errorElements = modal.querySelectorAll(
                ".form-error, .invalid-feedback"
            );
            errorElements.forEach((el) => el.remove());

            const invalidInputs = modal.querySelectorAll(".is-invalid");
            invalidInputs.forEach((input) =>
                input.classList.remove("is-invalid")
            );
        }

        modal.classList.add("active");
        document.body.style.overflow = "hidden";
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove("active");
        document.body.style.overflow = "";

        // Reset form
        const form = modal.querySelector("form");
        if (form) {
            form.reset();
        }

        // Hapus semua pesan error
        const errorElements = modal.querySelectorAll(
            ".form-error, .invalid-feedback, .is-invalid"
        );
        errorElements.forEach((el) => el.remove());

        // Hapus class is-invalid dari input
        const invalidInputs = modal.querySelectorAll(".is-invalid");
        invalidInputs.forEach((input) => input.classList.remove("is-invalid"));
    }
}

function confirmDelete() {
    if (!currentDeleteData) return;

    showLoading();

    // Simulate API call
    setTimeout(() => {
        hideLoading();
        closeModal("delete-modal");
        showNotification(
            "success",
            "Berhasil",
            `Data ${currentDeleteData.name} berhasil dihapus`
        );

        // Refresh table data here
        // refreshTableData(currentDeleteData.type);

        currentDeleteData = null;
    }, 1000);
}

function showLoading() {
    const overlay = document.getElementById("loading-overlay");
    overlay.classList.add("active");
}

function hideLoading() {
    const overlay = document.getElementById("loading-overlay");
    overlay.classList.remove("active");
}
const userProfile = document.getElementById("user-profile");
const profileDropdown = document.getElementById("profile-dropdown");

userProfile.addEventListener("click", (e) => {
    e.stopPropagation();
    profileDropdown.classList.toggle("show");
});

// Close dropdown when clicking outside
document.addEventListener("click", () => {
    profileDropdown.classList.remove("show");
});

profileDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
});

// Laporan Functions
function buatLaporan() {
    editingReportId = null;
    document.getElementById("form-title").textContent = "Buat Laporan Baru";
    document.getElementById("submit-text").textContent = "Simpan";
    document.getElementById("form-laporan").style.display = "block";
    document.getElementById("daftar-laporan").style.display = "none";
    document.getElementById("fab-laporan").style.display = "none";

    // Reset form
    document.getElementById("report-form").reset();
    clearValidation();

    // Set max date to today
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("tanggal").max = today;
}

function batalLaporan() {
    editingReportId = null; // <== tambahkan ini
    document.getElementById("form-laporan").style.display = "none";
    document.getElementById("daftar-laporan").style.display = "block";
    document.getElementById("fab-laporan").style.display = "flex";
    clearValidation();
}

function simpanLaporan() {
    // Show success notification
    showNotificationLaporan("Laporan berhasil disimpan!", "success");
    batalLaporan();
}

function updateCharCounter(fieldId) {
    const field = document.getElementById(fieldId);
    const counter = document.getElementById(
        fieldId === "isi_laporan" ? "isi-counter" : fieldId + "-counter"
    );

    if (!field || !counter) return;

    const maxLength = field.maxLength;
    const currentLength = field.value.length;

    counter.textContent = `${currentLength}/${maxLength}`;

    // Update counter color based on usage
    counter.classList.remove("warning", "error");
    if (currentLength > maxLength * 0.9) {
        counter.classList.add("error");
    } else if (currentLength > maxLength * 0.8) {
        counter.classList.add("warning");
    }
}

// Notification System
function showNotificationLaporan(message, type = "info") {
    // Create notification element
    const notification = document.createElement("div");
    notification.style.position = "fixed";
    notification.style.bottom = "4.5rem";
    notification.style.left = "50%";
    notification.style.transform = "translateX(-50%)";
    notification.style.padding = "0.75rem 1.25rem";
    notification.style.borderRadius = "0.5rem";
    notification.style.color = "white";
    notification.style.fontSize = "0.875rem";
    notification.style.fontWeight = "500";
    notification.style.zIndex = "1000";
    notification.style.display = "flex";
    notification.style.alignItems = "center";
    notification.style.gap = "0.5rem";
    notification.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
    notification.style.transition = "all 0.3s ease";
    notification.style.opacity = "0";
    notification.style.transform = "translate(-50%, 1rem)";
    notification.style.maxWidth = "90%";

    // Set colors based on notification type
    if (type === "success") {
        notification.style.background = "var(--success-500)";
        notification.innerHTML =
            '<i class="fas fa-check-circle"></i> ' + message;
    } else if (type === "warning") {
        notification.style.background = "var(--warning-500)";
        notification.innerHTML =
            '<i class="fas fa-exclamation-triangle"></i> ' + message;
    } else if (type === "error") {
        notification.style.background = "var(--danger-500)";
        notification.innerHTML =
            '<i class="fas fa-times-circle"></i> ' + message;
    } else {
        notification.style.background = "var(--primary-500)";
        notification.innerHTML =
            '<i class="fas fa-info-circle"></i> ' + message;
    }

    // Add to document
    document.body.appendChild(notification);

    // Trigger animation
    setTimeout(() => {
        notification.style.opacity = "1";
        notification.style.transform = "translate(-50%, 0)";
    }, 10);

    // Remove after delay
    setTimeout(() => {
        notification.style.opacity = "0";
        notification.style.transform = "translate(-50%, -1rem)";

        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

function validateField(fieldId, value) {
    const field = document.getElementById(fieldId);
    const errorElement = document.getElementById(fieldId + "-error");
    const successElement = document.getElementById(fieldId + "-success");

    // Check if elements exist before proceeding
    if (!field || !errorElement || !successElement) {
        return true; // Return true if elements don't exist to avoid errors
    }

    let isValid = true;
    let errorMessage = "";

    // Clear previous states
    field.classList.remove("error", "success");
    errorElement.style.display = "none";
    successElement.style.display = "none";

    switch (fieldId) {
        case "judul":
            if (!value.trim()) {
                errorMessage = "Judul laporan wajib diisi";
                isValid = false;
            } else if (value.trim().length < 5) {
                errorMessage = "Judul laporan minimal 5 karakter";
                isValid = false;
            } else if (value.length > 255) {
                errorMessage = "Judul laporan maksimal 255 karakter";
                isValid = false;
            }
            break;

        case "jenis_laporan":
            if (!value) {
                errorMessage = "Jenis laporan wajib dipilih";
                isValid = false;
            }
            break;

        case "tanggal":
            if (!value) {
                errorMessage = "Tanggal wajib diisi";
                isValid = false;
            } else {
                const selectedDate = new Date(value);
                const today = new Date();
                today.setHours(23, 59, 59, 999); // Set to end of today

                if (selectedDate > today) {
                    errorMessage = "Tanggal tidak boleh melebihi hari ini";
                    isValid = false;
                }
            }
            break;

        case "isi_laporan":
            if (!value.trim()) {
                errorMessage = "Isi laporan wajib diisi";
                isValid = false;
            } else if (value.trim().length < 15) {
                errorMessage = "Isi laporan minimal 15 karakter";
                isValid = false;
            } else if (value.length > 5000) {
                errorMessage = "Isi laporan maksimal 5000 karakter";
                isValid = false;
            }
            break;
    }

    if (isValid) {
        field.classList.add("success");
        successElement.innerHTML = '<i class="fas fa-check"></i> Valid';
        successElement.style.display = "flex";
    } else {
        field.classList.add("error");
        errorElement.innerHTML =
            '<i class="fas fa-exclamation-circle"></i> ' + errorMessage;
        errorElement.style.display = "flex";
    }

    return isValid;
}

function clearValidation() {
    const fields = ["judul", "jenis_laporan", "tanggal", "isi_laporan"];
    fields.forEach((fieldId) => {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + "-error");
        const successElement = document.getElementById(fieldId + "-success");

        if (field) {
            field.classList.remove("error", "success");
        }
        if (errorElement) {
            errorElement.style.display = "none";
        }
        if (successElement) {
            successElement.style.display = "none";
        }
    });

    // Reset character counters
    updateCharCounter("judul");
    updateCharCounter("isi_laporan");
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("report-form");
    const fields = ["judul", "jenis_laporan", "tanggal", "isi_laporan"];

    // Add real-time validation
    fields.forEach((fieldId) => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener("blur", function () {
                validateField(fieldId, this.value);
            });

            field.addEventListener("input", function () {
                if (fieldId === "judul" || fieldId === "isi_laporan") {
                    updateCharCounter(fieldId);
                }

                // Clear error state on input
                if (this.classList.contains("error")) {
                    this.classList.remove("error");
                    const errorElement = document.getElementById(
                        fieldId + "-error"
                    );
                    if (errorElement) {
                        errorElement.style.display = "none";
                    }
                }
            });
        }
    });

    // Form submission
    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = {
                siswa_id: document.getElementById("siswa_id").value,
                judul: document.getElementById("judul").value,
                jenis_laporan: document.getElementById("jenis_laporan").value, // ubah ini
                tanggal: document.getElementById("tanggal").value,
                isi_laporan: document.getElementById("isi_laporan").value,
                status: "pending", // tambahkan ini kalau default
            };

            // Validate all fields
            let isFormValid = true;
            fields.forEach((fieldId) => {
                const isValid = validateField(fieldId, formData[fieldId]);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            if (!isFormValid) {
                // Shake form on validation error
                form.classList.add("shake");
                setTimeout(() => form.classList.remove("shake"), 500);
                showNotificationLaporan(
                    "Mohon perbaiki kesalahan pada form",
                    "error"
                );
                return;
            }

            // Show loading state
            const submitBtn = document.getElementById("submit-btn");
            const submitText = document.getElementById("submit-text");
            const originalText = submitText.textContent;

            submitBtn.disabled = true;
            submitText.innerHTML =
                '<div class="loading-spinner"></div> Menyimpan...';
            // Tentukan method dan URL
            let method, url;
            if (editingReportId) {
                method = "PUT";
                url = `/siswa/laporan/${editingReportId}`;
            } else {
                method = "POST";
                url = "/siswa/laporan";
            }

            // Simulate API call
            fetch(url, {
                method: method,
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(formData),
            })
                .then((response) => {
                    return response.text().then((text) => {
                        console.log("Raw response:", text); // 👈 ini penting
                        try {
                            return JSON.parse(text);
                        } catch (e) {
                            throw new Error("Invalid JSON: " + text);
                        }
                    });
                })
                .then((data) => {
                    if (data.success) {
                        // Tambahkan ke reports dari respons Laravel
                        showNotificationLaporan(
                            editingReportId
                                ? "Laporan berhasil diperbarui!"
                                : "Laporan berhasil disimpan!",
                            "success"
                        );

                        // Reset form
                        batalLaporan();
                        fetchReports();
                        editingReportId = null; // ✅ reset ID edit
                    } else {
                        showNotificationLaporan(
                            "Gagal menyimpan laporan.",
                            "error"
                        );
                    }
                })
                .catch((error) => {
                    console.error("Terjadi kesalahan:", error);
                    showNotificationLaporan("Kesalahan server.", "error");
                })
                .finally(() => {
                    // Reset loading state
                    submitBtn.disabled = false;
                    submitText.textContent = originalText;
                });
        });
    }
});

let reports = []; // global
let currentPage = 1;
let editingReportId = null;
const itemsPerPage = 5;

function editReport(id) {
    console.log("ID yang mau diedit:", id);
    console.log("Semua reports:", reports);

    const report = reports.find((r) => r.id == id);
    console.log("Report yang ditemukan:", report);
    if (!report) return;

    editingReportId = id;
    document.getElementById("form-title").textContent = "Edit Laporan";
    document.getElementById("submit-text").textContent = "Update";
    document.getElementById("form-laporan").style.display = "block";
    document.getElementById("daftar-laporan").style.display = "none";
    document.getElementById("fab-laporan").style.display = "none";

    // Fill form with existing data
    document.getElementById("judul").value = report.judul;
    document.getElementById("jenis_laporan").value = report.jenis_laporan;
    document.getElementById("tanggal").value = report.tanggal;
    document.getElementById("isi_laporan").value = report.isi_laporan;

    // Update character counters
    updateCharCounter("judul");
    updateCharCounter("isi_laporan");

    // Set max date to today
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("tanggal").max = today;

    clearValidation();
}

function viewReport(id) {
    const report = reports.find((r) => r.id === id);
    if (!report) return;

    const modal = document.getElementById("report-modal");
    const modalTitle = document.getElementById("modal-title");
    const modalBody = document.getElementById("modal-body");

    modalTitle.textContent = report.judul;
    modalBody.innerHTML = `
                <div style="margin-bottom: 1.5rem;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                        <div>
                            <label style="font-size: 0.75rem; color: var(--text-secondary); text-transform: uppercase; font-weight: 600;">Jenis Laporan</label>
                            <p style="font-weight: 500;">${
                                report.jenis_laporan === "mingguan"
                                    ? "Laporan Mingguan"
                                    : "Laporan Akhir"
                            }</p>
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--text-secondary); text-transform: uppercase; font-weight: 600;">Tanggal</label>
                            <p style="font-weight: 500;">${formatDate(
                                report.tanggal
                            )}</p>
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--text-secondary); text-transform: uppercase; font-weight: 600;">Status</label>
                            <div>${getStatusBadge(report.status)}</div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label style="font-size: 0.75rem; color: var(--text-secondary); text-transform: uppercase; font-weight: 600; margin-bottom: 0.5rem; display: block;">Isi Laporan</label>
                    <div style="background: var(--bg-secondary); padding: 1rem; border-radius: 0.5rem; line-height: 1.6;">
                        ${report.isi_laporan.replace(/\n/g, "<br>")}
                    </div>
                </div>
                
                <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; justify-content: flex-end;">
                    <button class="btn btn-secondary" onclick="closeReportModal()">
                        <i class="fas fa-times"></i>
                        <span>Tutup</span>
                    </button>
                    <button class="btn btn-warning" onclick="closeReportModal(); editReport(${
                        report.id
                    })">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </button>
                </div>
            `;

    modal.classList.add("active");
}

function openDeleteModal(id) {
    const report = reports.find((r) => r.id === id);
    if (!report) return;

    const modal = document.getElementById("delete-modal");
    const modalBody = document.getElementById("delete-modal-body");
    const modalFooter = document.getElementById("delete-modal-footer");

    // Isi body konfirmasi
    modalBody.innerHTML = `
        <div style="text-align: center; padding: 1rem;">
            <div style="width: 4rem; height: 4rem; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                <i class="fas fa-exclamation-triangle" style="color: var(--danger-500); font-size: 1.5rem;"></i>
            </div>
            <p style="margin-bottom: 0.5rem; font-weight: 600; color: var(--text-primary);">Apakah Anda yakin?</p>
            <p style="margin: 0; color: var(--text-secondary); font-size: 0.875rem;">
                Apakah Anda yakin ingin menghapus <strong>"${report.judul}"</strong>? Data yang dihapus tidak dapat dikembalikan.
            </p>
        </div>
    `;

    // Isi footer tombol
    modalFooter.innerHTML = `
        <button class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
        <button class="btn btn-danger" onclick="deleteReport(${report.id})">
            <i class="fas fa-trash"></i> Hapus
        </button>
    `;

    modal.classList.add("active");
}
function closeDeleteModal() {
    document.getElementById("delete-modal").classList.remove("active");
}
function closeReportModal() {
    document.getElementById("report-modal").classList.remove("active");
}

function deleteReport(id) {
    fetch(`/siswa/laporan/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                showNotificationLaporan("Laporan berhasil dihapus!", "success");
                closeDeleteModal();
                fetchReports(); // render ulang list
            } else {
                showNotificationLaporan("Gagal menghapus laporan.", "error");
            }
        })
        .catch((err) => {
            console.error("❌ Gagal hapus:", err);
            showNotificationLaporan(
                "Terjadi kesalahan saat menghapus.",
                "error"
            );
        });
}

function renderReports() {
    console.log("🔧 renderReports() dipanggil");
    const reportsList = document.getElementById("reports-list");

    if (!reportsList) return;

    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedReports = reports.slice(start, end);

    if (reports.length === 0) {
        reportsList.innerHTML = `
            <div style="text-align: center; padding: 2rem; color: var(--text-secondary);">
                <i class="fas fa-file-alt" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                <p>Belum ada laporan yang dibuat</p>
                <button class="btn btn-primary" onclick="buatLaporan()" style="margin-top: 1rem;">
                    <i class="fas fa-plus"></i>
                    <span>Buat Laporan Pertama</span>
                </button>
            </div>
        `;
        return;
    }

    reportsList.innerHTML = paginatedReports
        .map((report) => {
            const statusBadge = getStatusBadge(report.status);
            const preview = truncateText(report.isi_laporan, 100);
            const formattedDate = formatDate(report.tanggal);
            const jenisText =
                report.jenis_laporan === "mingguan" ? "Mingguan" : "Akhir";

            return `
                <div class="data-item">
                    <div style="flex: 1;">
                        <div class="data-item-header">
                            <div class="data-item-content">
                                <h5>${report.judul}</h5>
                                <p>${formattedDate} - ${jenisText}</p>
                            </div>
                            ${statusBadge}
                        </div>
                        <div class="data-item-preview">${preview}</div>
                        <div class="data-item-actions">
                            <button class="btn btn-sm btn-secondary" onclick="viewReport(${report.id})">
                                <i class="fas fa-eye"></i><span class="hidden-mobile">Lihat</span>
                            </button>
                            <button class="btn btn-sm btn-warning" onclick="editReport(${report.id})">
                                <i class="fas fa-edit"></i><span class="hidden-mobile">Edit</span>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="openDeleteModal(${report.id})">
                                <i class="fas fa-trash"></i><span class="hidden-mobile">Hapus</span>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        })
        .join("");

    renderPagination(); // ⬅️ Tambahkan ini
}
function renderPagination() {
    const paginationContainer = document.getElementById("pagination-container");
    if (!paginationContainer) return;

    const totalItems = reports.length;

    if (totalItems === 0) {
        paginationContainer.style.display = "none";
        return;
    } else {
        paginationContainer.style.display = "flex"; 
    }

    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const startItem = (currentPage - 1) * itemsPerPage + 1;
    const endItem = Math.min(startItem + itemsPerPage - 1, totalItems);

    // Informasi jumlah data
    const info = `
        <div class="pagination-info">
            Menampilkan ${startItem}-${endItem} dari ${totalItems} data
        </div>
    `;

    // Tombol halaman
    let buttons = `
        <button class="pagination-btn" ${currentPage === 1 ? "disabled" : ""}
            onclick="goToPage(${currentPage - 1})">
            <i class="fas fa-chevron-left"></i>
        </button>
    `;

    for (let i = 1; i <= totalPages; i++) {
        buttons += `
            <button class="pagination-btn ${currentPage === i ? "active" : ""}"
                onclick="goToPage(${i})">${i}</button>
        `;
    }

    buttons += `
        <button class="pagination-btn" ${
            currentPage === totalPages ? "disabled" : ""
        }
            onclick="goToPage(${currentPage + 1})">
            <i class="fas fa-chevron-right"></i>
        </button>
    `;

    paginationContainer.innerHTML =
        info + `<div class="pagination">${buttons}</div>`;
}

function goToPage(page) {
    currentPage = page;
    renderReports();
}

function fetchReports() {
    fetch("/siswa/laporan/json")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Gagal ambil data laporan");
            }
            return response.json();
        })
        .then((data) => {
            console.log("✅ Data berhasil diambil:", data);
            console.log("🔍 Data pertama:", data[0]); // Tambah ini
            console.log("✅ Data berhasil diambil:", data);
            reports = data;
            renderReports();
        })
        .catch((error) => {
            console.error("❌ Gagal ambil laporan:", error);
        });
}

function getStatusBadge(status) {
    switch (status) {
        case "selesai":
            return '<span class="badge badge-success">Disetujui</span>';
        case "pending":
            return '<span class="badge badge-warning">Pending</span>';
        case "ditolak":
            return '<span class="badge badge-danger">Ditolak</span>';
        default:
            return '<span class="badge badge-warning">Pending</span>';
    }
}

function truncateText(text, maxLength) {
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength) + "...";
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString("id-ID", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    });
}
// Handle window resize
window.addEventListener("resize", () => {
    if (window.innerWidth >= 1024 && sidebar.classList.contains("open")) {
        closeSidebar();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    fetchReports();

    // Set max date for date input
    const today = new Date().toISOString().split("T")[0];
    const dateInput = document.getElementById("tanggal");
    if (dateInput) {
        dateInput.max = today;
    }

    // Add touch-friendly interactions
    const touchElements = document.querySelectorAll(
        ".card, .stat-card, .data-item, .btn"
    );
    touchElements.forEach((el) => {
        el.addEventListener(
            "touchstart",
            function () {
                this.style.transform = "scale(0.98)";
            },
            { passive: true }
        );

        el.addEventListener(
            "touchend",
            function () {
                this.style.transform = "";
            },
            { passive: true }
        );
    });
});

let currentAttendanceType = null;

function openAttendanceModal() {
    const modal = document.getElementById("attendance-modal");
    modal.classList.add("active");

    resetAttendanceForm();
}

function selectAttendanceType(type) {
    currentAttendanceType = type;

    // Update visual selection
    document.querySelectorAll(".attendance-option").forEach((option) => {
        option.classList.remove("selected");
    });
    event.target.closest(".attendance-option").classList.add("selected");
}

function closeAttendanceModal() {
    const modal = document.getElementById("attendance-modal");
    modal.classList.remove("active");
    resetAttendanceForm();
}

function resetAttendanceForm() {
    currentAttendanceType = null;
    document.querySelectorAll(".attendance-option").forEach((option) => {
        option.classList.remove("selected");
    });
    document.getElementById("permission-form").style.display = "none";
    document.getElementById("permission-request-form").reset();
}

function confirmAttendance() {
    if (!currentAttendanceType) {
        alert("Pilih jenis absensi dulu!");
        return;
    }

    // Kirim ke Livewire!
    Livewire.dispatch("selected-attendance-js", [currentAttendanceType]);

    // Livewire.find('nama-komponen').call('selectedAttendanceType', selectedType);

    document.getElementById("confirm-text").style.display = "none";
    document.getElementById("confirm-loading").style.display = "inline-flex";
}

function updateJam() {
    const el = document.getElementById("jam");
    setInterval(() => {
        const sekarang = new Date();
        const jam = sekarang.toLocaleTimeString("id-ID", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
        });
        el.textContent = jam;
    }, 1000);
}

document.addEventListener("DOMContentLoaded", updateJam);
Livewire.on("absensiBerhasil", () => {
    closeAttendanceModal();
    document.getElementById("confirm-text").style.display = "inline";
    document.getElementById("confirm-loading").style.display = "none";
    selectedType = null;
});
