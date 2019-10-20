class User {
    constructor(nom, email, numero) {
        this.nom = nom;
        this.sante = sante;
        this.force = force;
        this.xp = 0; // Toujours 0 au début
    }
    // Attaque une cible
    attaquer(cible) {
        if (this.sante > 0) {
            const degats = this.force;
            console.log(
                `${this.nom} attaque ${
                    cible.nom
                    } et lui inflige ${degats} points de dégâts`
            );
            cible.sante -= degats;
            if (cible.sante > 0) {
                console.log(`${cible.nom} a encore ${cible.sante} points de vie`);
            } else {
                cible.sante = 0;
                const bonusXP = 10;
                console.log(
                    `${this.nom} a tué ${
                        cible.nom
                        } et gagne ${bonusXP} points d'expérience`
                );
                this.xp += bonusXP;
            }
        } else {
            console.log(
                `${this.nom} n'a plus de points de vie et ne pas pas attaquer`
            );
        }
    }
    // Renvoie la description du personnage
    decrire() {
        return `${this.nom} a ${this.sante} points de vie, ${
            this.force
            } en force et ${this.xp} points d'expérience`;
    }
}