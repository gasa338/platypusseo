<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('hero_industry');

$color_scheme = $data['color_mode'] ?? 'light';
?>

<section class="py-24 relative hero-industry-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> <?php echo esc_attr($color_scheme == 'dark' ? 'bg-section-dark' : 'bg-background'); ?>" <?php echo _spacing($data['spacing']); ?>>
    <?php if ($color_scheme == 'dark'): ?>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgb(255, 255, 255) 1px, transparent 0px); background-size: 32px 32px;"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgb(0, 0, 0) 1px, transparent 0px); background-size: 32px 32px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-accent/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary/20 rounded-full blur-3xl"></div>
    <?php endif; ?>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl">
            <?php if (!empty($data['icon'])): ?>
                <div class="w-16 h-16 rounded-2xl bg-accent flex items-center justify-center mb-8">
                    <?php if (!empty($data['icon']['subtype'] == 'svg+xml')) : ?>
                        <?php echo maxwell_render_svg($data['icon']['url'], 'w-8 h-8 text-primary'); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url($data['icon']['url']); ?>" alt="<?php echo esc_attr($data['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($data['top_title'])): ?>
                <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'font-display text-5xl md:text-6xl font-bold mb-6 text-foreground' . ($color_scheme == 'dark' ? ' text-white/80' : ' text-muted-foreground')); ?>
            <?php if (!empty($data['text'])): ?>
                <div class="text-xl mb-10 <?php echo esc_attr($color_scheme == 'dark' ? 'text-white/80' : 'text-muted-foreground'); ?>"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
            <div class="flex flex-wrap gap-4">
                <?php if (!empty($data['link_1'])): ?>
                    <?php echo _link_1($data['link_1']); ?>
                <?php endif; ?>
                <?php if (!empty($data['link_2'])): ?>
                    <?php
                    if ($color_scheme == 'dark') :
                        echo _link_6($data['link_2']);
                    else :
                        echo _link_2($data['link_2']);
                    endif;
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<main class="bg-background text-foreground">

  <!-- SECTION 1 — HERO -->
  <section class="py-20 border-b border-border">
    <div class="container mx-auto px-6 max-w-3xl">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">
        Predictable Organic Growth for B2B SaaS
      </h1>

      <p class="text-lg text-muted-foreground mb-4">
        Organic search should not be a channel you hope works.
      </p>

      <p class="text-lg text-muted-foreground mb-10">
        This engagement is designed to turn organic growth into a dependable source of qualified demand, pipeline, and revenue — owned end-to-end and operated as a system.
      </p>

      <div class="flex flex-col sm:flex-row gap-4">
        <a href="#contact"
           class="bg-primary text-primary-foreground px-6 py-3 rounded-lg text-center">
          Request a Fit Conversation
        </a>

        <a href="/how-we-work"
           class="border border-border px-6 py-3 rounded-lg text-center">
          How this works →
        </a>
      </div>

      <p class="text-sm text-muted-foreground mt-4">
        For B2B SaaS teams exploring organic growth as a serious revenue channel.
      </p>
    </div>
  </section>


  <!-- SECTION 2 — THE PROBLEM -->
  <section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
      <h2 class="text-3xl font-semibold mb-8">
        Why organic growth rarely becomes predictable
      </h2>

      <p class="text-lg text-muted-foreground mb-6">
        Most B2B SaaS teams invest in SEO activity, but struggle to rely on it commercially.
      </p>

      <p class="text-lg text-muted-foreground mb-6">
        Results fluctuate. Priorities change. Pipeline impact is unclear. Over time, organic search becomes something to maintain rather than something the business depends on.
      </p>

      <p class="text-lg text-muted-foreground">
        The issue is rarely effort or intent. It’s the lack of ownership and system-level coordination.
      </p>
    </div>
  </section>


  <!-- SECTION 3 — OUTCOME CARDS -->
  <section class="py-24 bg-section-light">
    <div class="container mx-auto px-6 max-w-6xl">
      <h2 class="text-3xl font-semibold mb-12 text-center">
        What changes when organic growth is owned end-to-end
      </h2>

      <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Predictable qualified demand
          </h3>
          <p class="text-muted-foreground">
            Organic search becomes a dependable contributor to inbound pipeline, not a volatile traffic source.
          </p>
        </div>

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Stronger buyer confidence
          </h3>
          <p class="text-muted-foreground">
            Your brand shows up consistently during research, comparison, and shortlisting — reinforcing trust before sales conversations begin.
          </p>
        </div>

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Clearer growth decisions
          </h3>
          <p class="text-muted-foreground">
            Teams stop debating SEO priorities and start planning around organic search as a reliable growth input.
          </p>
        </div>

      </div>
    </div>
  </section>


  <!-- SECTION 4 — WHAT YOU ARE BUYING -->
  <section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
      <h2 class="text-3xl font-semibold mb-8">
        One engagement. Full ownership of organic growth.
      </h2>

      <p class="text-lg text-muted-foreground mb-6">
        This is not a collection of SEO services.
      </p>

      <p class="text-lg text-muted-foreground mb-6">
        There is a single engagement: complete ownership of organic growth — from demand capture and authority to discovery and conversion.
      </p>

      <p class="text-lg text-muted-foreground mb-6">
        Decisions are made centrally, priorities are sequenced deliberately, and performance is managed as a system rather than a set of tasks.
      </p>

      <p class="text-lg text-foreground font-medium">
        That ownership is what makes predictability possible.
      </p>
    </div>
  </section>


  <!-- SECTION 5 — SYSTEM CARDS -->
  <section class="py-24 bg-section-medium">
    <div class="container mx-auto px-6 max-w-6xl">
      <h2 class="text-3xl font-semibold mb-12 text-center">
        How predictable organic growth is built
      </h2>

      <div class="grid md:grid-cols-2 gap-8">

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            High-intent demand capture
          </h3>
          <p class="text-muted-foreground">
            Focuses on capturing existing demand when buyers are actively researching and evaluating — not generating surface-level traffic.
          </p>
        </div>

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Trust & authority signals
          </h3>
          <p class="text-muted-foreground">
            Strengthens the credibility signals buyers and AI systems rely on during evaluation and decision-making.
          </p>
        </div>

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Search & AI discovery visibility
          </h3>
          <p class="text-muted-foreground">
            Ensures your brand is clearly understood and accurately represented across search engines and AI-driven discovery platforms.
          </p>
        </div>

        <div class="bg-card border border-border p-8 rounded-xl">
          <h3 class="font-semibold text-xl mb-3">
            Conversion yield optimisation
          </h3>
          <p class="text-muted-foreground">
            Improves the commercial return from existing demand by refining conversion paths, intent alignment, and funnel efficiency.
          </p>
        </div>

      </div>
    </div>
  </section>


  <!-- SECTION 6 — CASE PREVIEW -->
  <section class="py-24">
    <div class="container mx-auto px-6 max-w-5xl">
      <h2 class="text-3xl font-semibold mb-12 text-center">
        When organic growth is treated as a system
      </h2>

      <div class="space-y-10 mb-10">

        <div>
          <h3 class="font-semibold text-xl mb-2">Landlord Vision</h3>
          <p class="text-muted-foreground">
            Organic search restructured around demand capture and evaluation, turning it into a dependable source of inbound demos across traditional and AI discovery.
          </p>
        </div>

        <div>
          <h3 class="font-semibold text-xl mb-2">Workever</h3>
          <p class="text-muted-foreground">
            Shifted from fragmented SEO activity to system ownership, improving consistency of qualified sign-ups and confidence in organic growth as a channel.
          </p>
        </div>

      </div>

      <div class="text-center">
        <a href="/case-studies"
           class="bg-primary text-primary-foreground px-6 py-3 rounded-lg">
          View case studies
        </a>
      </div>
    </div>
  </section>


  <!-- SECTION 7 — COMPARISON -->
  <section class="py-24 bg-section-light">
    <div class="container mx-auto px-6 max-w-3xl">
      <h2 class="text-3xl font-semibold mb-8">
        How this compares to other SEO support models
      </h2>

      <p class="text-lg text-muted-foreground mb-6">
        Execution-only SEO models struggle with accountability and commercial alignment.
      </p>

      <p class="text-lg text-muted-foreground mb-6">
        Internal teams often struggle to maintain senior focus and momentum over time.
      </p>

      <p class="text-lg text-muted-foreground">
        This engagement exists between those extremes — providing senior ownership of organic growth without the overhead of building and managing it internally.
      </p>
    </div>
  </section>


  <!-- SECTION 8 — WHAT HAPPENS NEXT -->
  <section class="py-24">
    <div class="container mx-auto px-6 max-w-3xl">
      <h2 class="text-3xl font-semibold mb-8">
        What happens if you want to explore this
      </h2>

      <ol class="space-y-4 text-lg text-muted-foreground list-decimal list-inside">
        <li>You request a fit conversation</li>
        <li>We assess whether predictable organic growth is achievable and worthwhile</li>
        <li>You receive a clear recommendation — whether that’s moving forward or not</li>
      </ol>
    </div>
  </section>


  <!-- SECTION 9 — FINAL CTA -->
  <section class="py-24 border-t border-border bg-section-dark text-white">
    <div class="container mx-auto px-6 max-w-3xl text-center">
      <h2 class="text-3xl font-semibold mb-8">
        Explore whether this makes sense for your business
      </h2>

      <a href="#contact"
         class="bg-primary text-primary-foreground px-8 py-4 rounded-lg text-lg inline-block">
        Request a Fit Conversation
      </a>

      <p class="text-sm text-muted-foreground mt-4">
        A short, focused conversation to assess feasibility and fit — not a sales pitch.
      </p>
    </div>
  </section>

</main>
