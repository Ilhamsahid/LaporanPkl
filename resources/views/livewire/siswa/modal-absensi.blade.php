<div id="attendance-modal" class="modal" x-data="{ show: @entangle('showModal') }" x-show="show">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="attendance-modal-title">Absensi Hari Ini</h3>
            <button class="modal-close" onclick="closeAttendanceModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <!-- Current Time -->
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <div class="clock-display" id="current-time" wire:model.live='timeNow'> <span
                        id="jam">{{ $timeNow }}</span></div>
                <div class="date-display" id="current-date">
                    {{ \Carbon\Carbon::parse(now())->locale('id')->translatedFormat('l, d F Y') }}</div>
            </div>

            <!-- Time Alert -->
            <div id="time-alert" class="time-alert time-alert-info" style="display: none;">
                <i class="fas fa-info-circle"></i>
                <div>
                    <strong>Informasi:</strong>
                    <p id="time-alert-message"></p>
                </div>
            </div>

            <!-- Attendance Options -->
            <div class="attendance-options">
                <div class="attendance-option" onclick="selectAttendanceType('hadir')">
                    <div class="attendance-option-icon" style="color: var(--success-500);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="attendance-option-label">Hadir</div>
                </div>
                <div class="attendance-option" onclick="selectAttendanceType('izin')">
                    <div class="attendance-option-icon" style="color: var(--info-500);">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="attendance-option-label">Izin</div>
                </div>
                <div class="attendance-option" onclick="selectAttendanceType('sakit')">
                    <div class="attendance-option-icon" style="color: var(--purple-500);">
                        <i class="fas fa-thermometer-half"></i>
                    </div>
                    <div class="attendance-option-label">Sakit</div>
                </div>
                <div class="attendance-option" onclick="selectAttendanceType('alpha')">
                    <div class="attendance-option-icon" style="color: var(--danger-500);">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="attendance-option-label">Tidak Hadir</div>
                </div>
            </div>
            <!-- Action Buttons -->
            <div style="display: flex; gap: 0.75rem; justify-content: flex-end; margin-top: 1.5rem;">
                <button class="btn btn-secondary" onclick="closeAttendanceModal()">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </button>
                <button class="btn btn-primary" onclick="confirmAttendance()">
                    <span id="confirm-text" style="display:inline-flex; gap: 0.5rem;">
                        <i class="fas fa-check"></i>
                        Konfirmasi
                    </span>
                    <span id="confirm-loading" style="display: none; gap: 0.5rem;">
                        <i class="fas fa-spinner fa-spin"></i>
                        Loading...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
