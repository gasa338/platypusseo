1. ssh-keygen -t ecdsa -b 521
2. isprati korake tj treba da se kreira fajl sa ssh kljucem
3. kada se doda public key idi na manage i klikni na authorize
4. sada komandom cd .ssh udji u folder
5. i komndom cat id_ecdsa.pub prikazi key i kopitraj ga


6. sada na github u settigs idi na Deploy keys i klikni na Add deploy key
7. u title upisi ssh-key i u key upisi kopirani key

8. nakon ovoga vracamo se u terminal i komandom ssh -T git@github.com proverimo da li je ssh key dodat
9. nakon toga komandom git remote -v
10. git remote set-url origin git@github.com:platypusseo-dev.git (kopiraj iz ssh linka)
11. nakon toga iz cpanela idi na Git version controle
