# Benchmark different linear searches for objects with conditionals.

PoC benchmark using a PHP-bitfield implementation to simulate a datastructure with low computation data.

## Results on my machine

Running on `Linux 6.1.49-1-MANJARO #1 SMP PREEMPT_DYNAMIC Sun Aug 27 23:08:04 UTC 2023 x86_64 GNU/Linux` with a AMD Ryzen 9 5900HX and 32GB ram.

```log
~/Dev/Benchmarks via 🐘 v8.2.9
❯ php run.php
Populating time: 0.42403507232666
Runnning 100 times on 1000000 elements.
With calculation.
Array foreach:
Construction time: 0.31824803352356
Time: 17.41082406044
Memory: 32
Result length: 124784
SPLObj foreach:
Construction time: 0.23712301254272
Time: 10.270215034485
Memory: 0
Result length: 124784
SPLObj iterator:
Construction time: 0.23729395866394
Time: 10.019357204437
Memory: 0
Result length: 124784

~/Dev/Benchmarks via 🐘 v8.2.9 took 39s
➜ php run.php
Populating time: 0.40824007987976
Runnning 100 times on 1000000 elements.
Without calculation.
Array foreach:
Construction time: 0.29237699508667
Time: 15.361974954605
Memory: 32
Result length: 124995
SPLObj foreach:
Construction time: 0.23714089393616
Time: 8.2872409820557
Memory: 0
Result length: 124995
SPLObj iterator:
Construction time: 0.23472595214844
Time: 7.1867470741272
Memory: 0
Result length: 124995

~/Dev/Benchmarks via 🐘 v8.2.9 took 32s
➜ php run.php
Populating time: 0.39736104011536
Runnning 100 times on 1000000 elements.
Without calculation.
Array foreach:
Construction time: 0.3003408908844
Time: 16.971712112427
Memory: 32
Result length: 124761
SPLObj foreach:
Construction time: 0.25484585762024
Time: 9.3212110996246
Memory: 0
Result length: 124761
SPLObj iterator:
Construction time: 0.35231590270996
Time: 8.0289208889008
Memory: 0
Result length: 124761

Benchmarks on  main [?] via 🐘 v8.2.9 took 36s
```
