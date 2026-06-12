@php
    $reviews = json_decode($expert->customer_review, true);
    $totalReviews = is_array($reviews) ? count($reviews) : 0;
    $averageRating = $totalReviews > 0 ? round(array_sum(array_column($reviews, 'rating')) / $totalReviews, 1) : 4.8;
    
    // Process skills for Expertise
    $expertise = '';
    if(!empty($expert->skills)) {
        $skillsArr = is_array($expert->skills) ? $expert->skills : json_decode($expert->skills, true);
        if(is_array($skillsArr)) {
            $expertise = implode(', ', array_slice($skillsArr, 0, 4));
        } else {
            $expertise = $expert->subject;
        }
    } else {
        $expertise = $expert->subject;
    }
@endphp

<div class="znw-expert-card">
    <div class="znw-card-header">
        <div class="znw-avatar-wrapper">
            <img src="{{ $expert->image ? asset($expert->image) : asset('assets/media/avatars/blank.png') }}" alt="{{ $expert->name }}">
        </div>
        <div class="znw-header-info">
            <h3 class="znw-expert-name">{{ $expert->name }}</h3>
            <p class="znw-expert-role">{{ $expert->service ?? $expert->subject . ' Expert' }}</p>
            <div class="znw-expert-rating">
                <div class="znw-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="znw-star {{ $i <= $averageRating ? 'filled' : '' }}">★</span>
                    @endfor
                </div>
                <span class="znw-rating-number">{{ number_format($averageRating, 1) }}</span>
            </div>
        </div>
    </div>

    <div class="znw-card-body">
        <div class="znw-orders-stat">
            <svg class="znw-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
            </svg>
            <div>
                <span class="znw-orders-count">{{ $expert->finish_order ?? '1500' }}+</span>
                <span class="znw-orders-text">Orders Completed</span>
            </div>
        </div>

        <div class="znw-info-section">
            <h4 class="znw-info-title">Expertise</h4>
            <p class="znw-info-text">{{ $expertise ?: 'Academic Writing, Research' }}</p>
        </div>

        <div class="znw-info-section">
            <h4 class="znw-info-title">Qualifications</h4>
            <p class="znw-info-text">Ph.D. in {{ $expert->subject ?? 'Respective Field' }}</p>
        </div>
    </div>

    <div class="znw-card-footer">
        <a href="writers/{{$expert->slug ?? '#'}}" class="znw-hire-btn">
            Hire Now <span class="znw-btn-arrow">→</span>
        </a>
    </div>
</div>
